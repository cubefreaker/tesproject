<?php

class member extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation', 'session', 'ion_auth', 'general'));
        $this->load->helper(array('language', 'form'));
        $this->load->model('m_general');
        $this->general->saveVisitor($this, [1, 0]);
    }

    // function index()
    // {
    //     $data = $this->m_general->loadGeneralData();
    //     $data = array();

    //     $this->load->view('member/index', $data);
    // }
    function index() //before was login()
    {        
        // get general data for header and footer
        $data = $this->m_general->loadGeneralData();
        $data['error'] = FALSE;
        // if ($input = $this->input->post()) {
        //     $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        //     $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]');
        //     if ($this->form_validation->run() === FALSE)
        //     {
        //         $data['error'] = trim(strip_tags(validation_errors()));
        //     }
        //     else
        //     {
            
        //         $identity = $input['email'];
        //         $password = $input['password'];
        //         $remember = isset($input['remember_me']) ? TRUE : FALSE;
        //         if( $this->ion_auth->login($identity, $password, $remember)) {
        //             // redirect them to the member dashboard page
        //             redirect(base_url("member/dashboard"), "refresh");
        //         }
        //         else {
        //             $data['error'] = strip_tags($this->ion_auth->errors());
        //         }
        //     }
        // }
        
        redirect(base_url('member/personalData'));
        
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
                    redirect(base_url("member/personalData"), "refresh");
                }
                else {
                    $data['error'] = strip_tags($this->ion_auth->errors());
                }
            }
        }
        
        $this->load->view('member/login', $data);
        
    }

    public function submitRegister()
    {
        $data['error'] = FALSE;
        $result = ['status'=>TRUE, 'message'=>'Data harus diisi', 'data'=>[]];
        if ($input = $this->input->post()) {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('bdate', 'Birth Date', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]');
            $this->form_validation->set_rules('repassword', 'Password Confirmation', 'trim|required|matches[password]');
            $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|alpha|max_length[50]');
            $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|max_length[50]');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha|max_length[50]');
            $this->form_validation->set_rules('phone', 'Phone Number', 'trim|numeric|required|max_length[20]');
            if ($this->form_validation->run() === FALSE)
            {
                $result['message'] = trim(strip_tags(validation_errors()));
            }
            else
            {
                $firstname      = $this->input->post('firstname');
                $lastname       = $this->input->post('lastname');
                $username       = $this->input->post('username');
                $phone          = $this->input->post('phone');
                $gender         = $this->input->post('gender');
                $bdate          = $this->input->post('bdate');
                $email = strtolower($this->input->post('email'));
                $password = $this->input->post('password');

                $additional_data = array(
                    'username'      => $username,
                    'phone'         => $phone,
                    'gender'        => $gender,
                    'first_name'    => $firstname,
                    'last_name'     => $lastname,
                    'birth_date'    => $bdate,
                    'status'        => 0,
                    'type'          => 5,
                    'created_date'  => date('Y-m-d H:i:s'),
                    'created_by'    => 0
                );
                if ($this->form_validation->run() === TRUE 
                    && $this->ion_auth->register($email, $password, $email, $additional_data))
                {
                    $result = ['status'=>TRUE, 'message'=>trim(strip_tags($this->ion_auth->messages())), 'data'=>[]];
                    redirect('member/login', 'refresh');
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

    public function register()
    {
        $data = $this->m_general->loadGeneralData();
        $data['error'] = FALSE;
        //set up email
		// 	$config = array(
        //         'protocol' => 'smtp',
        //         'smtp_host' => 'ssl://smtp.googlemail.com',
        //         'smtp_port' => 465,
        //         'smtp_user' => '<a href="mailto:testsourcecodester@gmail.com" rel="nofollow">testsourcecodester@gmail.com</a>', // change it to yours
        //         'smtp_pass' => 'mysourcepass', // change it to yours
        //         'mailtype' => 'html',
        //         'charset' => 'iso-8859-1',
        //         'wordwrap' => TRUE
        //   );

        //   $message = 	"
        //               <html>
        //               <head>
        //                   <title>Verification Code</title>
        //               </head>
        //               <body>
        //                   <h2>Thank you for Registering.</h2>
        //                   <p>Your Account:</p>
        //                   <p>Email: ".$email."</p>
        //                   <p>Password: ".$password."</p>
        //                   <p>Please click the link below to activate your account.</p>
        //                   <h4><a href='".base_url()."user/activate/".$id."/".$code."'>Activate My Account</a></h4>
        //               </body>
        //               </html>
        //               ";

        //   $this->load->library('email', $config);
        //   $this->email->set_newline("\r\n");
        //   $this->email->from($config['smtp_user']);
        //   $this->email->to($email);
        //   $this->email->subject('Signup Verification Email');
        //   $this->email->message($message);

          //sending email
        //   if($this->email->send()){
        //       $this->session->set_flashdata('message','Activation code sent to email');
        //   }
        //   else{
        //       $this->session->set_flashdata('message', $this->email->print_debugger());

        //   }


        $this->load->view('member/register', $data);
        
    }

    //user email activation
    // public function activate(){
	// 	$id =  $this->uri->segment(3);
	// 	$code = $this->uri->segment(4);
 
	// 	//fetch user details
	// 	$user = $this->users_model->getUser($id);
 
	// 	//if code matches
	// 	if($user['code'] == $code){
	// 		//update user active status
	// 		$data['active'] = true;
	// 		$query = $this->users_model->activate($data, $id);
 
	// 		if($query){
	// 			$this->session->set_flashdata('message', 'User activated successfully');
	// 		}
	// 		else{
	// 			$this->session->set_flashdata('message', 'Something went wrong in activating account');
	// 		}
	// 	}
	// 	else{
	// 		$this->session->set_flashdata('message', 'Cannot activate account. Code didnt match');
	// 	}
 
	// 	redirect('register');
 
    // }
    

    public function logout()
    {
        // log the user out
        $logout = $this->ion_auth->logout();
        // redirect them to the landing page
        $this->session->set_flashdata('message', $this->ion_auth->messages());
        redirect(base_url(), 'refresh');
    }

    // public function dashboard()
    // {
    //     // redirect them to the login page if not logged in or is login as admin
    //     if ( !$this->ion_auth->logged_in() || $this->ion_auth->is_admin() || $this->ion_auth->user()->row()->type < 5 )
    //         redirect(base_url('member/login'), 'refresh');

    //     // get general data for header and footer
    //     $this->load->model('member/m_member');
    //     $data = $this->m_general->loadGeneralData();
    //     $data['Member'] = $this->ion_auth->user()->row();
    //     // $data['List'] = [];
    //     $this->load->model('m_general');
        
    //     $this->load->view('member/dashboard', $data);
    // }

    public function personalData()
    {
        // redirect them to the login page if not logged in or is login as admin
        if ( !$this->ion_auth->logged_in() || $this->ion_auth->is_admin() || $this->ion_auth->user()->row()->type < 5 )
            redirect(base_url('member/login'), 'refresh');

        // get general data for header and footer
        $this->load->model('member/m_member');
        $data = $this->m_general->loadGeneralData();
        $data['Member'] = $this->ion_auth->user()->row();
        // $data['List'] = [];
        $this->load->model('m_general');
        
        $this->load->view('member/profile', $data);
    }

    public function accountRole(){

        $user = $this->ion_auth->user()->row();
        $dataRole = [
            'username'  => $user->username,
        ];
        
        if($this->input->post('type') == 'seller'){
            $dataRole['is_seller'] = 'Y';
            $dataRole['seller_status'] = 'requested';
        }else{
            $dataRole['is_buyer'] = 'Y';
            $dataRole['buyer_status'] = 'requested';

            $checkapi = $this->input->post('api') != '' ? 'Y' : 'N';
            $checkwl = $this->input->post('wl') != '' ? 'Y' : 'N';
            $checkta = $this->input->post('ta') != '' ? 'Y' : 'N';

            $dataRole['is_api'] = $checkapi;
            $dataRole['is_wl'] = $checkwl;
            $dataRole['is_ta'] = $checkta;
        }
        
        $this->load->model('m_get');
        $getData = [
            'select'  => '*',
            'from' => 'users_request',
            'where' => ['user_id' => $user->id]
        ];
        if($this->m_get->getDynamic($getData) == FALSE){
            $this->load->model('m_insert');
            $dataRole['user_id'] = $user->id;
            $dataRole['created_date'] = date('Y-m-d H:i:s');
            $dataInsert = [
                'table' => 'users_request',
                'data'  => $dataRole
            ];
            $this->m_insert->insertDynamic($dataInsert);
        }else{
            $this->load->model('m_update');
            $dataRole['modified_date'] = date('Y-m-d H:i:s');
            $dataUpdate = [
                'data'  => $dataRole,
                'table' => 'users_request',
                'where' => ['user_id' => $user->id]
            ];
            
            $this->m_update->updateDynamic($dataUpdate);
        }
        
        redirect('member/personalData', 'refresh');
    }

    function uploadImage()
    {
        $user = $this->ion_auth->user()->row();
            
        $config = array(
            'file_name' => $user->id.$user->username.time(),
            'upload_path' => './assets/images/profile/',
            'allowed_types' => 'jpg|png|jpeg',
            'max_size'  => '2048',
            'remove_space' => TRUE,
            'overwrite' => TRUE
        );
        
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('imageURL')){
            $error = array('error' => $this->upload->display_errors());
            echo $error['error'];
        }
        else{
            $data = $this->upload->data();
            $imagename = ['img_thum' => $data['file_name']];
            $dataimg = [
                'data'  => $imagename,
                'table' => 'users',
                'where' => ['id' => $this->ion_auth->user()->row()->id]
            ];
            $this->load->model('m_update');
            $this->m_update->updateDynamic($dataimg);
            $this->session->set_flashdata('img_uploaded_msg', '<div class="alert alert-success">Image uploaded successfully!</div>');
            $this->session->set_flashdata('img_uploaded', $imagename);
            redirect(base_url('member/personalData'), 'refresh');

        }
    }

    function uploadBrandlogo()
    {
        $query = $this->db->query("SELECT * FROM users_company WHERE id = '".$Member->id."'");
        
        if($query->num_rows() > 0){
            $company = $query->row();
            $config = array(
                'file_name' => $company->co_id.time(),
                'upload_path' => './assets/images/profile/',
                'allowed_types' => 'jpg|png|jpeg',
                'max_size'  => '2048',
                'remove_space' => TRUE,
                'overwrite' => TRUE
            );
            
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('imgLogo')){
                $error = array('error' => $this->upload->display_errors());
                echo $error['error'];
            }
            else{
                $data = $this->upload->data();
                $logoname = ['logo' => $data['file_name']];
                $dataimg = [
                    'data'  => $logoname,
                    'table' => 'users_company',
                    'where' => ['id' => $company->id]
                ];
                $this->load->model('m_update');
                $this->m_update->updateDynamic($dataimg);
                $this->session->set_flashdata('img_uploaded_msg', '<div class="alert alert-success">Image uploaded successfully!</div>');
                $this->session->set_flashdata('img_uploaded', $imagename);
                redirect(base_url('member/personalData'), 'refresh');
    
            }
        }else{
            $user = $this->ion_auth->user()->row();
            $config = array(
                'file_name' => $user->id.time(),
                'upload_path' => './assets/images/profile/',
                'allowed_types' => 'jpg|png|jpeg',
                'max_size'  => '2048',
                'remove_space' => TRUE,
                'overwrite' => TRUE
            );
            
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('imgLogo')){
                $error = array('error' => $this->upload->display_errors());
                echo $error['error'];
            }
            else{
                $data = $this->upload->data();
                $data = ['logo' => $data['file_name'], 'id' => $user->id];
                $dataimg = [
                    'data'  => $data,
                    'table' => 'users_company'
                ];
                $this->load->model('m_insert');
                $this->m_update->insertDynamic($dataimg);
                $this->session->set_flashdata('img_uploaded_msg', '<div class="alert alert-success">Image uploaded successfully!</div>');
                $this->session->set_flashdata('img_uploaded', $data['file_name']);
                redirect('refresh');
    
            }
        }

    }


    public function editProfile()
    {
        // $InputData = json_decode(file_get_contents('php://input'),true);
        // $Return = ['StatusResponse'=>0, 'Message'=>''];
        // $ProfileData = $InputData['data'];
        // if (isset($ProfileData['Password1']) && isset($ProfileData['Password2']) ) {
        //     if ($ProfileData['Password1'] != $ProfileData['Password2']) {
        //         $Return['Message'] = 'Password Not match';
        //         echo $Return;
        //         die();
        //     }
        //     else {
        //         $Password = $this->ion_auth->reset_password($this->ion_auth->user()->row()->username, $ProfileData['Password1']);
        //     }
        // }
        // else {
        //     $Password = false;
        // }

        $MemberData = [
            'username'      => $this->input->post('username'),
            'first_name'    => $this->input->post('firstname'),
            'last_name'     => $this->input->post('lastname'),
            'gender'        => $this->input->post('gender'),
            'birth_date'    => $this->input->post('birthdate'),
            'email'         => $this->input->post('email'),
            'phone'         => $this->input->post('phone')
        ];
        // if ($Password) {
        //     $MemberData['Password'] = $Password;
        // }
        $this->load->model('m_update');
        $dataProfile = [
            'data'  => $MemberData,
            'table' => 'users',
            'where' => ['id' => $this->ion_auth->user()->row()->id]
        ];
        // if($this->session->flashdata('BankImage')){
        //     $dataBank['data']['imgor'] = $this->session->flashdata('BankImage');
        // }
        $this->m_update->updateDynamic($dataProfile);
        // $Return['StatusResponse'] = 1;
        // echo json_encode($Return);
        redirect(base_url('member/personalData'), 'refresh');
    }

    function editMitra()
    {
        $user = $this->ion_auth->user()->row();
            
        $config = array(
            'file_name' => $user->id.'_company_'.$user->username.time(),
            'upload_path' => './assets/images/logo/',
            'allowed_types' => 'jpg|png|jpeg',
            'max_size'  => '1024',
            'remove_space' => TRUE,
            'overwrite' => TRUE
        );

        $companyData = [
            'brand'      => $this->input->post('brand'),
            'company_name'    => $this->input->post('coname'),
            'owner'     => $this->input->post('owner'),
            'phone_no'        => $this->input->post('phone'),
            'mobile_no'    => $this->input->post('mobile'),
            'address'   => $this->input->post('address'),
            'sub_district'         => $this->input->post('subdistrict'),
            'province'         => $this->input->post('province'),
            'city'         => $this->input->post('city'),
            'email'         => $this->input->post('email'),
            'website'         => $this->input->post('website'),
            'postal_code'         => $this->input->post('postal')
        ];
        
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('logoURL')){
            $error = array('error' => $this->upload->display_errors());
            // echo $error['error'];
            // die();
        }
        else{
            $data = $this->upload->data();
            $companyData['logo']  = $data['file_name'];
            // return $data;
        }

        $this->load->model('m_get');
        $getData = [
            'select'  => '*',
            'from' => 'users_company',
            'where' => ['id' => $user->id]
        ];
        if($this->m_get->getDynamic($getData) == FALSE){
            $this->load->model('m_insert');
            $companyData['id'] = $user->id;
            $dataInsert = [
                'table' => 'users_company',
                'data'  => $companyData
            ];
            $this->m_insert->insertDynamic($dataInsert);
        }else{
            $this->load->model('m_update');
            $dataUpdate = [
                'data'  => $companyData,
                'table' => 'users_company',
                'where' => ['id' => $user->id]
            ];
            
            $this->m_update->updateDynamic($dataUpdate);
        }
        
        // echo json_encode($Return);
        redirect('member/personalData', 'refresh');        
        
    }

    function editKontak()
    {
        $user = $this->ion_auth->user()->row();

        $contactData = [
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'mobile' => $this->input->post('mobile'),
            'name_ops' => $this->input->post('nameops'),
            'email_ops' => $this->input->post('emailops'),
            'phone_ops' => $this->input->post('phoneops'),
            'mobile_ops' => $this->input->post('mobileops')
        ];

        $getContact = [
            'select' => '*',
            'from'  => 'company_contact',
            'where' => ['user_id' => $user->id]
        ];
        $this->load->model('m_get');
        if($this->m_get->getRowDynamic($getContact) == FALSE){
            $contactData['user_id'] = $user->id;
            $this->load->model('m_insert');
            $dataInsert = [
                'table' => 'company_contact',
                'data' => $contactData
            ];
            $this->m_insert->insertDynamic($dataInsert);
        }else{
            $this->load->model('m_update');
            $dataUpdate = [
                'data'  => $contactData,
                'table' => 'company_contact',
                'where' => ['user_id' => $user->id]
            ];
            
            $this->m_update->updateDynamic($dataUpdate);
        }

        redirect('member/personalData');
    }

    public function editDokumen()
    {
        $user = $this->ion_auth->user()->row();
            
        $config = array(
            'upload_path' => './assets/file_upload/',
            'allowed_types' => 'jpg|png|jpeg|pdf',
            'max_size'  => '4096',
            'remove_space' => TRUE,
            'overwrite' => TRUE
        );

        $dokumenData = [
            // 'created_date'  => date('Y-m-d H:i:s')
        ];
        
        $this->load->library('upload', $config);

        //Upload KTP
        if(!$this->upload->do_upload('scktp')){
            $error = array('error' => $this->upload->display_errors());
            // echo $error['error'];
        }
        else{
            $scktp = $this->upload->data();
            $dokumenData['scan_ktp']  = $scktp['file_name'];
        }
        
        //Upload NPWP
        if(!$this->upload->do_upload('scnpwp')){
            $error = array('error' => $this->upload->display_errors());
            // echo $error['error'];
        }
        else{
            $scnpwp = $this->upload->data();
            $dokumenData['scan_npwp']  = $scnpwp['file_name'];
        }

        //Upload SIUP/TDP
        if(!$this->upload->do_upload('scsiup')){
            $error = array('error' => $this->upload->display_errors());
            // echo $error['error'];
        }
        else{
            $scsiup = $this->upload->data();
            $dokumenData['scan_siup']  = $scsiup['file_name'];
        }

        //Upload AKTA
        if(!$this->upload->do_upload('scakta')){
            $error = array('error' => $this->upload->display_errors());
            // echo $error['error'];
        }
        else{
            $scakta = $this->upload->data();
            $dokumenData['scan_akta']  = $scakta['file_name'];
        }

        //Upload SK
        if(!$this->upload->do_upload('scsk')){
            $error = array('error' => $this->upload->display_errors());
            // echo $error['error'];
        }
        else{
            $scsk = $this->upload->data();
            $dokumenData['scan_sk']  = $scsk['file_name'];
        }

        $this->load->model('m_get');
        $getData = [
            'select'  => '*',
            'from' => 'users_document',
            'where' => ['user_id' => $user->id]
        ];

        if($this->m_get->getDynamic($getData) == FALSE){
            $this->load->model('m_insert');
            $dokumenData['user_id'] = $user->id;
            $dataInsert = [
                'table' => 'users_document',
                'data'  => $dokumenData
            ];
            $this->m_insert->insertDynamic($dataInsert);
        }else{
            $this->load->model('m_update');
            $dataUpdate = [
                'data'  => $dokumenData,
                'table' => 'users_document',
                'where' => ['user_id' => $user->id]
            ];
            
            $this->m_update->updateDynamic($dataUpdate);

        }
        
        // echo json_encode($Return);
        redirect('member/personalData', 'refresh');      
    }

    function editRekening()
    {
        $user = $this->ion_auth->user()->row();
        $rekData = [
            'bank_name' => $this->input->post('bankname'),
            'bank_account' => $this->input->post('bankaccount'),
            'bank_user' => $this->input->post('bankuser')
        ];

        $getRek = [
            'select' => '*',
            'from'  => 'users_bank',
            'where' => ['user_id' => $user->id]
        ];
        $this->load->model('m_get');
        if($this->m_get->getRowDynamic($getRek) == FALSE){
            $rekData['user_id'] = $user->id;
            $this->load->model('m_insert');
            $dataInsert = [
                'table' => 'users_bank',
                'data' => $rekData
            ];
            $this->m_insert->insertDynamic($dataInsert);
        }else{
            $this->load->model('m_update');
            $dataUpdate = [
                'data'  => $rekData,
                'table' => 'users_bank',
                'where' => ['user_id' => $user->id]
            ];
            
            $this->m_update->updateDynamic($dataUpdate);
        }

        redirect('member/personalData');
    }


    public function changePassView()
    {
        $data = $this->m_general->loadGeneralData();
        // $data['error'] = FALSE;
        $this->load->view('member/change_pass', $data);
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

    public function changePassword()
	{
        
        $user = $this->ion_auth->user()->row();
        $this->form_validation->set_rules('newpass', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('newconfirm', 'Password Confirmation', 'trim|required|matches[newpass]');

        if ($this->form_validation->run() === FALSE)
        {
            $result['message'] = trim(strip_tags(validation_errors()));
        }else{
            $oldpass = $this->input->post('oldpass');
            $newpass = $this->input->post('newpass');

            $check = $this->ion_auth->hash_password_db($user->id, $oldpass);

            if($check == TRUE){
                $this->load->model('m_update');
                $data = [
                    'table' => 'users',
                    'where' => ['id' => $user->id],
                    'data'  => ['password' => $this->ion_auth->hash_password($newpass)]
                ];
                $this->load->model('m_update');
                $this->m_update->updateDynamic($data);
                $this->session->set_flashdata('message', 'Password Successfully Changed');
                redirect('member/personalData', 'refresh');
                // echo $this->ion_auth->hash_password($oldpass);
            }else{
                $this->session->set_flashdata('message', 'Wrong Password');
            }
        //     $passData =[
        //         'table' => 'users',
        //         'where' => ['id' => $user->id],
        //         'data' => ['password' => ]
        //     ]
        //     $data = [
        //         'select' => '*',
        //         'from'  => 'users',
        //         'where' => ['id' => $user->id, 'password' => ]
        //     ]
        //     $this->load->model('m_get');
        //     $checkpass = 
        }

    }
    

    public function privyUserReg()
    {
        $user = $this->ion_auth->user()->row();
        $privy = $this->db->query('select * from privyid_api')->row();
        $url = $privy->base.$privy->reg;
        $data = [
            'auth' => [$privy->user,$privy->pass],
            'headers' => [
                'Merchant-Key' => $privy->merchant_key,
                'Content-Type' => 'multipart/form-data'
            ],
            'query' => [
                'email' => $user->email,
                'phone' => $user->phone,
                'identity' => [
                    'nik' => '123456789',
                    'nama' => 'tes nama'
                ]
                ],
            'multipart' => [
                [
                    'name' => 'selfie',
                    'contents' => fopen('./assets/images/profile/profile.png', 'r')
                ],
                [
                    'name' => 'ktp',
                    'contents' => fopen('./assets/images/profile/010101.jpg', 'r')
                ]

            ]  
        ];
        
        $this->load->library('privyid_api');
        $resp = $this->privyid_api->postPrivyAPI($url, $data);
        $r = json_decode($resp, TRUE);
        
        if($r->code == 200){
            $this->load->model('m_insert');
            $dataUser = [
                'email' => $r->data->email,
                'phone' => $r->data->phone,
                'token' => $r->data->userToken,
                'status' => $r->data->status,
                'created_date' => date('Y-m-d H:i:s'),
                'user_id' => $user->id
            ];
            $dataInsert = [
                'table' => 'users_privyid',
                'data' => $dataUser
            ];
            $this->m_insert->insertDynamic($dataInsert);
            
        }

    }

    public function privyUserStatus()
    {
        $user = $this->ion_auth->user()->row();
        $privy = $this->db->query('select * from privyid_api')->row();
        $privyUser = $this->db->query('select * from users_privyid where user_id = "'.$user->id.'"')->row();
        $url = $privy->base.$privy->reg_status;
        $data = [
            'auth' => [$privy->user,$privy->pass],
            'form_params' => [
                'token' => $privyUser->token,
            ],
            'headers' => [
                'Merchant-Key' => $privy->merchant_key,
                'Content-Type' => 'multipart/form-data'
            ]
        ];
        
        
        $this->load->library('privyid_api');
        $resp = $this->privyid_api->postPrivyAPI($url, $data);
        $r = json_decode($resp);

    }

    public function privyDocUpload()
    {
        $user = $this->ion_auth->user()->row();
        $privy = $this->db->query('select * from users_privyid')->row();
        $url = $api->base.$api->doc_upload;
        $data = [
            'auth' => [$privy->user,$privy->pass],
            'headers' => [
                'Merchant-Key' => $privy->merchant_key,
                'Content-Type' => 'multipart/form-data'
            ],
            'query' => [
                'documentTitle' => 'doc title',
                'docType' => 'serial or parallel',
                'owner' => [
                    'privyId' => 'a privy id',
                    'enterpriseToken' => 'example token'
                ],
                'recipients' => [
                    [
                        'privyId' => 'a privy id',
                        'type' => 'Signer',
                        'enterpriseToken' => 'companyToken',
                    ],
                    [
                        'privyId' => 'a privy id',
                        'type' => 'Reviewer',
                        'enterpriseToken' => '',
                    ]
                ]
            ],
            'multipart' => [
                'name' => 'exampledoc.pdf',
                'contents' => fopen('path/to/file', 'r')
            ]
        ];
                
        $this->load->library('privyid_api');
        $resp = $this->privyid_api->postPrivyAPI($url, $data);
        $r = json_decode($resp, true);

        if($r->code == 200){
            $this->load->model('m_insert');
            $dataUser = [
                'doc_token' => $r->data->docToken,
                'doc_url' => $r->data->urlDocument,
                'reviewer' => $r->data->recipients[0]->type == 'Reviewer' ? $r->data->recipients[0]->privyId : $r->data->recipients[1]->privyId,
                'signer' => $r->data->recipients[1]->type == 'Signer' ? $r->data->recipients[1]->privyId : $r->data->recipients[0]->privyId,
                'posted_date' => date('Y-m-d H:i:s'),
                'user_id' => $user->id
            ];
            $dataInsert = [
                'table' => 'users_privyid_doc',
                'data' => $dataUser
            ];
            $this->m_insert->insertDynamic($dataInsert);
        }

    }

    public function privyDocStatus()
    {
        $user = $this->ion_auth->user()->row();
        $privy = $this->db->query('select * from privyid_api')->row();
        $doc = $this->db->query('select * from users_privyid_doc where id = ""')->row();
        $url = $privy->base.$privy->doc_status.'/'.$doc->doc_token;
        echo $url;die();
        $data = [
            'auth' => [$privy->user,$privy->pass],
            'headers' => [
                'Merchant-Key' => $privy->merchant_key,
                'Content-Type' => 'multipart/form-data'
            ]
            ];
        
        
        $this->load->library('privyid_api');
        $resp = $this->privyid_api->getPrivyAPI($url, $data);
        $r = json_decode($resp, true);

    }

    public function tes()
    {
        // $this->load->library('country_list');
        // $data = $this->country_list->country();
        // $newdata = array();
        // foreach($data as $a){
        //         array_push($newdata,$a); 
        // }
        // echo json_encode($newdata);

        // $img = file_get_contents('./assets/images/profile/21jokowi1554957442.jpg');

        // $data = base64_encode($img);

        // echo $img;
        // echo '<br>';
        $n = 22;    
        $data = $this->db->query('select * from users where id = "'.$n.'"')->row();
        // echo $data;
        if($data){
            echo $data->id;
        }else{
            echo 'tidak ada';
        }
    }

    public function tes2()
    {
        $this->load->library('privyid_api');

        $url = 'https://antavaya.opsifin.com/opsifin_api_print';
        $user = 'anv-ops189';
        $pass = '$2y$10$XFSAh4wRcteGhbzXoEEuU./6XWinKmEunDNdqs1/dRX9oylpNJ9da';
        $data = [
            'auth' => [$user,$pass],
            // 'headers' => [
            //     'Content-Type' => 'application/json'
            // ]
        ];
        $resp = $this->privyid_api->tesGet($url, $data);
        // var_dump($resp);
        print_r($resp);
        // $r = json_decode($resp, true);
        // echo json_encode($r[0]);
    }

    public function tes3()
    {
        $data = json_decode('', true);

        $data1 = json_encode($data);

        echo $data;
    }
   
}