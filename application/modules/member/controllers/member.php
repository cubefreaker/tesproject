<?php

class member extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation', 'session', 'ion_auth', 'general'));
        $this->load->helper(array('language'));
        $this->load->model('m_general');
        $this->general->saveVisitor($this, [1, 0]);
    }

    function index()
    {
        $data = $this->m_general->loadGeneralData();
        $data['error'] = FALSE;

        $this->load->view('member/login', $data);
    }

    function login()
    {        
        // get general data for header and footer
        $data = $this->m_general->loadGeneralData();
        $data['error'] = FALSE;
        if ($input = $this->input->post()) {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]');
            if ($this->form_validation->run() === FALSE)
            {
                $data['error'] = trim(strip_tags(validation_errors()));
            }
            else
            {
            
                $identity = $input['email'];
                $password = $input['password'];
                $remember = isset($input['remember_me']) ? TRUE : FALSE;
                if( $this->ion_auth->login($identity, $password, $remember)) {
                    // redirect them to the member dashboard page
                    redirect(base_url("member/dashboard"), "refresh");
                }
                else {
                    $data['error'] = strip_tags($this->ion_auth->errors());
                }
            }
        }
        
        $this->load->view('member/login', $data);
    }

    public function register()
    {
        $result = ['status'=>TRUE, 'message'=>'Data harus diisi', 'data'=>[]];
        if ($input = $this->input->post()) {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]');
            $this->form_validation->set_rules('repassword', 'Password Confirmation', 'trim|required|matches[password]');
            $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|alpha|max_length[50]');
            $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|max_length[50]');
            $this->form_validation->set_rules('phone', 'Phone Number', 'trim|numeric|required|max_length[20]');
            if ($this->form_validation->run() === FALSE)
            {
                $result['message'] = trim(strip_tags(validation_errors()));
            }
            else
            {
                $firstname      = $input['firstname'];
                $lastname       = $input['lastname'];
                $email          = strtolower($input['email']);
                $password       = $input['password'];
                $phone          = $input['phone'];
                $email = strtolower($this->input->post('email'));
                $password = $this->input->post('password');

                $additional_data = array(
                    'first_name'    => $firstname,
                    'last_name'     => $lastname,
                    'phone'         => $phone,
                    'status'        => 0,
                    'type'          => 5,
                    'created_date'  => date('Y-m-d H:i:s'),
                    'created_by'    => 0
                );
                if ($this->form_validation->run() === TRUE 
                    && $this->ion_auth->register($email, $password, $email, $additional_data))
                {
                    $result = ['status'=>TRUE, 'message'=>trim(strip_tags($this->ion_auth->messages())), 'data'=>[]];
                }
                else {
                    $result['message'] = trim(strip_tags($this->ion_auth->errors()));
                }
            }
        }
        else {

        }

        echo json_encode($result);
    }

    public function logout()
    {
        // log the user out
        $logout = $this->ion_auth->logout();
        // redirect them to the landing page
        $this->session->set_flashdata('message', $this->ion_auth->messages());
        redirect(base_url(), 'refresh');
    }

    public function dashboard()
    {
        // redirect them to the login page if not logged in or is login as admin
        if ( !$this->ion_auth->logged_in() || $this->ion_auth->is_admin() || $this->ion_auth->user()->row()->type < 5 )
            redirect(base_url('member/login'), 'refresh');

        // get general data for header and footer
        $this->load->model('member/m_member');
        $data = $this->m_general->loadGeneralData();
        // $data['MasterAirport']          = $this->m_get->getMasterAirport();
        // // $data['MasterBank']             = $this->m_get->getMasterBank();
        // $data['MasterBank'] = $this->m_get->getDynamic([
        //     'select'    => 'id, name, rekening, rekening_name',
        //     'from'      => 'v2_master_bank',
        //     'where'     => ['id'=>1]
        // ]);
        // $data['BookingFormula']         = $this->m_get->getBookingFormula();
        // $data['Member']                 = $this->ion_auth->user()->row();

        // $Transactions = $this->m_member->getListTransactions($data['Member']->id);

        // $data['List'] = [];
        // $this->load->model('m_general');
        // if ($Transactions) {
        //     foreach ($Transactions as $key => $value) {
        //         $RsvResponse    = json_decode($value->RsvResponse);

        //         $Adult   = array_filter($RsvResponse->Passengers, function ($var) {
        //             return ($var->Type == 'Adult');
        //         });

        //         if (!$value->TotalPrice) {
        //             $GetPrice = $this->m_general->GetPrice(['OrderId' => $value->OrderId]);
        //             $TotalPrice = $GetPrice['TotalPrice'];
        //         }
        //         else {
        //             $TotalPrice = $value->TotalPrice;
        //         }

        //         $LfrRequest = json_decode($value->LfrRequest);
        //         $RsvArr['RsvStatus']            = $RsvResponse->Status;
        //         $RsvArr['FlightOrigin']         = $RsvResponse->FlightDetails[0]->Origin;
        //         $RsvArr['FlightDestination']    = $RsvResponse->FlightDetails[0]->Destination;
        //         $RsvArr['Adult']                = count($Adult);
        //         $RsvArr['ContactName']          = ucwords($LfrRequest->Contact->Title.' '.$LfrRequest->Contact->FirstName.' '.$LfrRequest->Contact->LastName);
        //         $RsvArr['ContactEmail']         = $LfrRequest->Contact->Email;
        //         $RsvArr['CreatedDate']          = $RsvResponse->Created;
        //         $RsvArr['OrderId']              = $value->OrderId;
        //         $RsvArr['IsRead']               = $value->IsRead;
        //         $RsvArr['PaymentStatus']        = $value->PaymentStatus;
        //         $RsvArr['PaymentStatusId']        = $value->PaymentStatusId;
        //         if ($value->PaymentStatusId != 3 && strtotime($value->RsvTimeLimit) < strtotime("NOW")) {
        //             $RsvArr['PaymentStatus'] = "Expired";
        //         }
        //         $RsvArr['RsvTimeLimit']         = $value->RsvTimeLimit;
        //         $RsvArr['OrderCount']           = $value->OrderCount;
        //         $RsvArr['RsvId']                = $value->RsvId;
        //         $RsvArr['TotalPrice']           = number_format($TotalPrice, 0, '', ',');
        //         $RsvArr['BankName']             = $value->BankName;
        //         $RsvArr['PayIsRead']            = $value->PayIsRead;
        //         $RsvArr['PaymentType']          = $value->PaymentType;
        //         $RsvArr['CreatedDateView']      = date('l, d M Y. - H:i', strtotime($RsvResponse->Created));
        //         $RsvArr['DueDate']              = date('l, d M Y. - H:i', strtotime($value->RsvTimeLimit));

        //         $data['List'][] = $RsvArr;                
        //     }

        // }

        $this->load->view('member/dashboard', $data);
    }

    // public function paymentConfirmation()
    // {
    //     // redirect them to the login page if not logged in or is login as admin
    //     if ( !$this->ion_auth->logged_in() || $this->ion_auth->is_admin() )
    //         redirect(base_url('member/login'), 'refresh');

    //     $data = $this->m_general->loadGeneralData();
    //     $data['MasterBank']     = $this->m_get->getMasterBank();

    //     $this->load->view('member/payment_confirmation', $data);
    // }

    // public function inputPaymentConfirmation()
    // {
    //     // redirect them to the login page if not logged in or is login as admin
    //     if ( !$this->ion_auth->logged_in() || $this->ion_auth->is_admin() )
    //         redirect(base_url('member/login'), 'refresh');

    //     $this->load->model('m_member');

    //     if ($input = $this->input->post()) {
    //         $result = array('status'=>FALSE, 'message'=>'Invalid Order ID', 'data'=>[]);
    //         $this->form_validation->set_rules('orderid', 'Order Id', 'trim|required|numeric');
    //         $this->form_validation->set_rules('bank', 'Bank From', 'trim|required');
    //         $this->form_validation->set_rules('bank_to', 'Bank To', 'trim|required');
    //         $this->form_validation->set_rules('accountname', 'Account Name', 'trim|required');
    //         $this->form_validation->set_rules('accountnumber', 'Account Number', 'trim|required|numeric');
    //         $this->form_validation->set_rules('ordertotal', 'Total Transfer', 'trim|required');
    //         $this->form_validation->set_rules('date_day_input', 'Transaction Date Day', 'trim|numeric|required|max_length[2]');
    //         $this->form_validation->set_rules('date_month_input', 'Transaction Date Month', 'trim|numeric|required|max_length[2]');
    //         $this->form_validation->set_rules('date_year_input', 'Transaction Date Year', 'trim|numeric|required|max_length[4]');

    //         // if validation false
    //         if ($this->form_validation->run() === FALSE)
    //         {
    //             $result['message'] = trim(strip_tags(validation_errors()));
    //         }
    //         // if validation true
    //         else
    //         {
    //             $trans_date = $input['date_year_input'].'-'.$input['date_month_input'].'-'.$input['date_day_input'] ;

    //             $paymentConfirmData = [
    //                 'id_rsv'            => $input['orderid'],
    //                 'bank_from'         => $input['bank'],
    //                 'bank_to'           => $input['bank_to'],
    //                 'account_name'      => $input['accountname'],
    //                 'account_number'    => $input['accountnumber'],
    //                 'amount'            => $input['ordertotal'],
    //                 'transf_date'       => $trans_date
    //             ];

    //             // update rsv table
    //             // set payment status, confirmation date, and undread confirmation
    //             if ($CheckRsv = $this->m_get->getRsvById($paymentConfirmData['id_rsv'])) {
    //                 $this->m_member->updateRsv(
    //                     $paymentConfirmData['id_rsv'],
    //                     [   'paymentstatus' => 1, 
    //                         'cf_date'       => date('Y-m-d H:i:s'),
    //                         'unread_cf'     => 1
    //                     ]
    //                 );
    //                 // insert data to rsv_confirmation table
    //                 $this->m_member->insertRsvConfirmation($paymentConfirmData);

    //                 $result = array('status'=>TRUE, 'message'=>'Success send payment confirmation', 'data'=>[]);
    //             }
    //         }
    //         echo json_encode($result);
    //     }
    //     else {
    //         redirect(base_url('member/login'), 'refresh');
    //     }
    // }

    public function editProfile()
    {
        $InputData = json_decode(file_get_contents('php://input'),true);
        $Return = ['StatusResponse'=>0, 'Message'=>''];
        $ProfileData = $InputData['data'];
        if (isset($ProfileData['Password1']) && isset($ProfileData['Password2']) ) {
            if ($ProfileData['Password1'] != $ProfileData['Password2']) {
                $Return['Message'] = 'Password Not match';
                echo $Return;
                die();
            }
            else {
                $Password = $this->ion_auth->reset_password($this->ion_auth->user()->row()->username, $ProfileData['Password1']);
            }
        }
        else {
            $Password = false;
        }

        $MemberData = [
            'username'      => $ProfileData['UserName'],
            'first_name'     => $ProfileData['FirstName'],
            'last_name'      => $ProfileData['LastName'],
            'phone'         => $ProfileData['Phone']
        ];
        // if ($Password) {
        //     $MemberData['Password'] = $Password;
        // }
        $this->load->model('m_update');
        $dataProfile = [
            'data'  => $MemberData,
            'table' => 'users',
            'where'     => ['id' => $this->ion_auth->user()->row()->id],
        ];
        // if($this->session->flashdata('BankImage')){
        //     $dataBank['data']['imgor'] = $this->session->flashdata('BankImage');
        // }
        $this->m_update->updateDynamic($dataProfile);
        $Return['StatusResponse'] = 1;
        echo json_encode($Return);
    }

    public function profile()
    {
        // redirect them to the login page if not logged in or is login as admin
        if ( !$this->ion_auth->logged_in() || $this->ion_auth->is_admin() )
            redirect(base_url('member/login'), 'refresh');

        $data = $this->m_general->loadGeneralData();
        $data['MasterCountry']  = $this->m_get->getMasterCountry();
        $Member         = $this->ion_auth->user()->row();
        $MemberData = [
            'UserName'      => $Member->username,
            'Email'         => $Member->email,
            'FirstName'     => $Member->first_name,
            'LastName'      => $Member->last_name,
            'Phone'         => $Member->phone,
            'Password'      => $Member->password
        ];
        $data['MemberData'] = $MemberData;
        $data['Member']     = $Member;

        $this->load->view('member/profile', $data);
    }

    public function detailTransaction($OrderId = FALSE)
    {
        if (!$OrderId) 
            die();

        // --- Check OrderId Exist --- /
        $this->load->model('adminpanel/m_manages');
        $Transactions = $this->m_manages->getTransactionByOrderId($OrderId);
        // --- End Check OrderId Exist --- /

        // --- Repopulate list Object --- //
        $data['List'] = [];
        if (!$Transactions) {
            die('no transaction');
        }

        $MasterAirline         = $this->m_get->getDynamicArray([
            'select'    => '*',
            'from'      => 'v2_master_airline',
            'where'     => []
        ]);

        $MasterAirport         = $this->m_get->getDynamicArray([
            'select'    => '*',
            'from'      => 'v2_master_airport',
            'where'     => []
        ]);

        $this->load->general('m_general');
        foreach ($Transactions as $key => $value) {
            $RsvResponse    = json_decode($value->RsvResponse);
            $AirlineId = array_search($RsvResponse->Airline, array_column($MasterAirline, 'code'));
            $Adult   = array_filter($RsvResponse->Passengers, function ($var) {
                return ($var->Type == 'Adult');
            });

            $GetPrice = $this->m_general->GetPrice(['OrderId' => $value->OrderId]);
            if (!$value->TotalPrice) {
                $TotalPrice     = $GetPrice['TotalPrice'];
            }
            else {
                $TotalPrice     = $value->TotalPrice;
            }
            $TotalDiscount  = $GetPrice['TotalDiscount'];

            $RsvArr['RsvResponse']          = $RsvResponse;
            $RsvArr['TotalPrice']           = number_format($value->TotalPrice, 0, '', ',');
            $RsvArr['AirlineName']          = $AirlineId ? $MasterAirline[$AirlineId]['name'] : '';
            $RsvArr['TimeLimit']            = date('D, d M Y. H:i', strtotime($RsvResponse->TimeLimit));
            $RsvArr['OrderDate']            = date('l, d F Y. - H:i', strtotime($RsvResponse->Created));
            $RsvArr['DueDate']              = date('l, d F Y. - H:i', strtotime($value->RsvTimeLimit));
            $RsvArr['OrderId']              = $value->OrderId;
            $RsvArr['Adult']                = count($Adult);
            $RsvArr['ContactName']          = $RsvResponse->Contact->Title.' '.$RsvResponse->Contact->FirstName.' '.$RsvResponse->Contact->LastName;
            $RsvArr['CreatedDate']          = $RsvResponse->Created;
            $RsvArr['ReffId']               = $value->ReffId;
            $RsvArr['IsRead']               = $value->IsRead;
            $RsvArr['PaymentStatus']        = $value->PaymentStatus;
            if (strtotime($value->RsvTimeLimit) < strtotime("NOW")) {
                $RsvArr['PaymentStatus'] = "Expired";
            }
            $RsvArr['OrderCount']           = $value->OrderCount;
            $RsvArr['RsvId']                = $value->RsvId;
            $RsvArr['PnrId']                = $value->PnrId;
            $RsvArr['TotalPrice']           = number_format($TotalPrice, 0, '', ',');
            $RsvArr['TotalDiscount']        = $TotalDiscount;
            $RsvArr['BankName']             = $value->BankName;
            $RsvArr['PaymentType']          = $value->PaymentType;
            $RsvArr['PaymentTypeOri']       = $value->PaymentTypeOri;
            $RsvArr['PriceBeforeDiscount']  = number_format($TotalPrice + $TotalDiscount, 0, '', ',');
            $RsvArr['PaymentStatusId']      = $value->PaymentStatusId;
            $RsvArr['IsTicketed']           = $RsvResponse->Ticketed;

            if (strtotime($RsvResponse->TimeLimit) < strtotime("now")) {
                $RsvArr['IsTicketExpired']    = TRUE;
            }
            else {
                $RsvArr['IsTicketExpired']    = FALSE;
            }

            $RsvArr['FlightDetails']        = [];
            foreach ($RsvResponse->FlightDetails as $key => $value) {                
                $AirlineId = array_search($value->Airline, array_column($MasterAirline, 'code'));
                $AirportDepartId = array_search($value->Origin, array_column($MasterAirport, 'code'));
                $AirportArriveId = array_search($value->Destination, array_column($MasterAirport, 'code'));

                $FlightDetail = array_merge( [], (Array) $value );
                $FlightDetail['AirlineName']        = $AirlineId ? $MasterAirline[$AirlineId]['name'] : '';
                $FlightDetail['AirportDepartName']  = $AirportDepartId ? $MasterAirport[$AirportDepartId]['cityname'] : '';
                $FlightDetail['AirportArriveName']  = $AirportArriveId ? $MasterAirport[$AirportArriveId]['cityname'] : '';
                $FlightDetail['DepartDateView']     = date('D, d M Y. H:i', strtotime($value->DepartDate.' '.$value->DepartTime));
                $FlightDetail['ArriveDateView']     = date('D, d M Y. H:i', strtotime($value->ArriveDate.' '.$value->ArriveTime));
                $RsvArr['FlightDetails'][] = (Object) $FlightDetail;
            }

            $data['List'][] = $RsvArr;
        }
        // --- End Repopulate List Object --- //

        // --- Update Payment Is Read --- //
        $this->load->model('m_update');
        $this->m_update->updateDynamic([
         'where'     => ['pay_order_id'=>$OrderId],
         'table'     => 'v2_rsv_payment',
         'data'      => ['pay_is_read'=>1]
        ]);
        // --- End Update Payment Is Read --- //

        echo "<pre>";
        print_r($data['List']);
        die();
    }
}