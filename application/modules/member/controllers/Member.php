<?php

use Dompdf\Dompdf;
class Member extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->library(array('form_validation', 'session', 'ion_auth', 'general'));
        $this->load->helper(array('language', 'form'));
        $this->load->model('m_general');
        $this->general->saveVisitor($this, [1, 0]);
    }

    /**
     * Get an instance of CodeIgniter
     *
     * @access    protected
     * @return    void
     */
    protected function ci()
    {
        return get_instance();
    }

    public function index() //before was login()
    {        
        // get general data for header and footer
        $data = $this->m_general->loadGeneralData();
        $data['error'] = FALSE;
        
        redirect(base_url('member/personalData'));
    }

    public function login()
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
        $this->load->model('M_member');
        $data['error'] = FALSE;
        $result['status'] = FALSE;
        $result['message'] = "";
        // $result = ['status'=>TRUE, 'message'=>'Data harus diisi', 'data'=>[]];
        
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('bdate', 'Birth Date', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('repassword', 'Password Confirmation', 'trim|required|matches[password]');
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|alpha|max_length[50]');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha|max_length[50]');
        $this->form_validation->set_rules('nik', 'NIK', 'trim|numeric|required|max_length[20]');
        $this->form_validation->set_rules('phone', 'Phone Number', 'trim|numeric|required|max_length[20]');
        if ($this->form_validation->run() === FALSE)
        {
            $result['status'] = FALSE;
            $result['message'] = trim(strip_tags(validation_errors()));
        }
        else
        {
            $firstname      = $this->input->post('firstname');
            $lastname       = $this->input->post('lastname');
            $username       = $this->input->post('username');
            $phone          = $this->input->post('phone');
            $nik            = $this->input->post('nik');
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
                'nik'           => $nik,
                'status'        => 0,
                'type'          => 5,
                'created_date'  => date('Y-m-d H:i:s'),
                'created_by'    => 0
            );

            $check_username = $this->M_member->check_username($username);

            if( $check_username ) {
                $result['status'] = FALSE;  
                $result['message'] = 'Username already exist';
            }

            if( $this->ion_auth->register($email, $password, $email, $additional_data) ) {
                $result['status'] = true;
                $result['message'] = "Success register";
            } else {
                $result['status']  = FALSE;
                $result['message'] = trim(strip_tags($this->ion_auth->errors()));

                if( $check_username ) {
                    $result = ['status'=>FALSE, 'message'=>'Username already exist', 'data'=>[]];
                }
            }
        }

        $this->output->set_content_type('application/json');
        echo json_encode($result);
        exit;
    }

    public function register()
    {
        $data = $this->m_general->loadGeneralData();
        $data['error'] = FALSE;

        $this->load->view('member/register', $data);      
    }

    public function logout()
    {
        // log the user out
        $logout = $this->ion_auth->logout();
        // redirect them to the landing page
        $this->session->set_flashdata('message', $this->ion_auth->messages());
        redirect(base_url(), 'refresh');
    }

    public function personalData()
    {
        // redirect them to the login page if not logged in or is login as admin
        if ( !$this->ion_auth->logged_in() || $this->ion_auth->is_admin() || $this->ion_auth->user()->row()->type < 5 )
            redirect(base_url('member/login'), 'refresh');

        // get general data for header and footer
        $this->load->model(array(
            'member/m_member',
            'Global_model'
        ));

        $data = $this->m_general->loadGeneralData();
        $data['Member'] = $this->ion_auth->user()->row();
        $data['Provinces'] = $this->db->query('select name from mst_provinces')->result();
        $data['Cities'] = $this->db->query('select name from mst_regencies')->result();
        $data['Districts'] = $this->db->query('select name from mst_districts')->result();

        $data['mitra_info'] = $this->Global_model->set_model('users_mitra','um','id')->mode(array(
            'type'          => 'single_row',
            'conditions'    => array(
                'user_id' => $this->ion_auth->user()->row()->id
            ),
            'return_object' => TRUE,
            'debug_query'   => false
        ));

        // print_r($data['mitra_info']);die();

        // $this->load->model('m_general');
        usort($data['Provinces'], function($a, $b) {
            if ($a==$b) return 0;
            return ($a<$b)?-1:1;
        });
        usort($data['Cities'], function($a, $b) {
            if ($a==$b) return 0;
            return ($a<$b)?-1:1;
        });
        usort($data['Districts'], function($a, $b) {
            if ($a==$b) return 0;
            return ($a<$b)?-1:1;
        });
        
        $this->load->view('member/profile', $data);
    }

    public function accountRole()
    {

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

    public function uploadImage()
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

    public function uploadBrandlogo()
    {
        $query = $this->db->query("SELECT * FROM users_mitra WHERE id = '".$Member->id."'");
        
        if($query->num_rows() > 0){
            $company = $query->row();
            $config = array(
                'file_name' => $company->id.time(),
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
                    'table' => 'users_mitra',
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
                    'table' => 'users_mitra'
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
            'phone'         => $this->input->post('phone'),
            'nik'           => $this->input->post('nik')
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

    public function editMitra()
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
            'mitra_name'    => $this->input->post('coname'),
            'owner'     => $this->input->post('owner'),
            'phone_no'        => $this->input->post('phone'),
            'mobile_no'    => $this->input->post('mobile'),
            'address'   => $this->input->post('address'),
            'sub_district'         => $this->input->post('subdistrict'),
            'province'         => $this->input->post('province'),
            'city'         => $this->input->post('city'),
            'email'         => $this->input->post('email'),
            'website'         => $this->input->post('website'),
            'postal_code'         => $this->input->post('postal'),
            'user_id'           => $this->ion_auth->user()->row()->id
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
            'from' => 'users_mitra',
            'where' => ['id' => $user->id]
        ];
        if($this->m_get->getDynamic($getData) == FALSE){
            $this->load->model('m_insert');
            $companyData['id'] = $user->id;
            $dataInsert = [
                'table' => 'users_mitra',
                'data'  => $companyData
            ];
            $this->m_insert->insertDynamic($dataInsert);
        }else{
            $this->load->model('m_update');
            $dataUpdate = [
                'data'  => $companyData,
                'table' => 'users_mitra',
                'where' => ['id' => $user->id]
            ];
            
            $this->m_update->updateDynamic($dataUpdate);
        }
        
        // echo json_encode($Return);
        redirect('member/personalData', 'refresh');        
    }

    public function editKontak()
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
            'mobile_ops' => $this->input->post('mobileops'),
            'user_id'           => $this->ion_auth->user()->row()->id
        ];

        $getContact = [
            'select' => '*',
            'from'  => 'users_contact',
            'where' => ['user_id' => $user->id]
        ];

        $this->load->model('m_get');
        if($this->m_get->getRowDynamic($getContact) == FALSE){
            $contactData['user_id'] = $user->id;
            $this->load->model('m_insert');
            $dataInsert = [
                'table' => 'users_kontak_perwakilan',
                'data' => $contactData
            ];
            $this->m_insert->insertDynamic($dataInsert);
        }else{
            $this->load->model('m_update');
            $dataUpdate = [
                'data'  => $contactData,
                'table' => 'users_kontak_perwakilan',
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
        
        //Upload Selfie
        if(!$this->upload->do_upload('scselfie')){
            $error = array('error' => $this->upload->display_errors());
            // echo $error['error'];
        }
        else{
            $scselfie = $this->upload->data();
            $dokumenData['scan_selfie']  = $scselfie['file_name'];
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

    public function editRekening()
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
        // $a = 'opsigoitx';
        // echo $this->bcrypt->hash($a); //$2y$08$vOaaUVUp/65calOv6POl/Oxj.pFJevquxTwQNLFibmGT.KgwKcSnW
    }

    public function tes2()
    {
        $this->load->library('privyid_api');

        // $url = 'https://antavaya.opsifin.com/opsifin_api_print';
        // $user = 'anv-ops189';
        // $pass = '$2y$10$XFSAh4wRcteGhbzXoEEuU./6XWinKmEunDNdqs1/dRX9oylpNJ9da';
        // $data = [
        //     'auth' => [$user,$pass],
        //     // 'headers' => [
        //     //     'Content-Type' => 'application/json'
        //     // ]
        // ];
        // $resp = $this->privyid_api->tesGet($url, $data);
        // // var_dump($resp);
        // print_r($resp);
        // $r = json_decode($resp, true);
        // echo json_encode($r[0]);
    }

    public function tes3()
    {
        $data = json_decode('', true);

        $data1 = json_encode($data);

        echo $data;
    }

    /**
     * Set validation rule 
     */
    private function _set_rule_validation() {

        //prepping to set no delimiters.
        $this->form_validation->set_error_delimiters('', '');
        $data = $this->input->post();
        //validates.
        //special validations for when editing.
        $this->form_validation->set_rules('buyer_type','Type Buyer','required');
        if( $data['buyer_type'] == API ) {
            $this->form_validation->set_rules('agree_nda_check', 'Check NDA', "required");
            $this->form_validation->set_rules('ip_dev_1','IP DEVELOPMENT','trim|required');
            $this->form_validation->set_rules('ip_production','IP PRODUCTION','trim|required');
            $this->form_validation->set_rules('agree_policy_check_buyer','Check Policy','required');
            $this->form_validation->set_rules('agree_ip_whitelist','Check IP Whitelist','required');
        }
    }

    public function submit_buyer() {

        //must ajax and must post.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
            exit('No direct script access allowed');
        }
        
        $this->load->model(array(
            'M_member',
            'Global_model'
        ));

        //initial.
        $message['is_error'] = true;
        $message['error_msg'] = "";
        $message['redirect_to'] = "";

        //sanitize input (id is primary key, if from edit, it has value).
        $id     = $this->input->post('id');
        $data   = $this->input->post();

        //server side validation.
        $this->_set_rule_validation();

        //checking.
        if ($this->form_validation->run($this) == FALSE) {

            //validation failed.
            $message['error_msg'] = validation_errors();
        } else {

            //begin transaction
            $this->db->trans_begin();
            //validation success
            //prepare save to DB
            
            $get_mitra_info = $this->Global_model->set_model('users_mitra','um','id')->mode(array(
                'type' => 'single_row',
                'conditions' => array(
                    'user_id' => $this->ion_auth->user()->row()->id
                ),
                'return_object' => true
            ));

            $check_buyer_api = $this->Global_model->set_model('users_buyer','um','id')->mode(array(
                'type' => 'single_row',
                'conditions' => array(
                    'user_id' => $this->ion_auth->user()->row()->id,
                    'buyer_type' => API
                ),
                'return_object' => true
            ));

            $check_buyer_whitelabel = $this->Global_model->set_model('users_buyer','um','id')->mode(array(
                'type' => 'single_row',
                'conditions' => array(
                    'user_id' => $this->ion_auth->user()->row()->id,
                    'buyer_type' => WHITELABEL
                ),
                'return_object' => true
            ));

            $check_buyer_ta = $this->Global_model->set_model('users_buyer','um','id')->mode(array(
                'type' => 'single_row',
                'conditions' => array(
                    'user_id' => $this->ion_auth->user()->row()->id,
                    'buyer_type' => TRAVELAGENT
                ),
                'return_object' => true
            ));


            // if(!empty($get_mitra_info)) {
            //     $mitra_name = ($get_mitra_info->mitra_name) ? $get_mitra_info->mitra_name : "";
            //     $email      = ($get_mitra_info->email) ? $get_mitra_info->email : "";
            //     $telp       = ($get_mitra_info->phone_no) ? $get_mitra_info->phone_no : "";
            //     $email      = ($get_mitra_info->email) ? $get_mitra_info->email : "";
            // } else {

            // }

            if( $data['buyer_type'] == API ) {

                if($check_buyer_api) {
                    $message['is_error']    = true;
                    $message['error_msg']   = "Tidak bisa melakukan request, Anda sudah request sebelumnya sebagai buyer (API)";
                    $message['redirect_to'] = "";

                    $this->output->set_content_type('application/json');
                    echo json_encode($message);
                    exit;
                } elseif(empty($get_mitra_info)) {
                    $message['is_error']    = true;
                    $message['error_msg']   = "Tidak bisa melakukan request, Silahkan isi informasi mitra";
                    $message['redirect_to'] = "";

                    $this->output->set_content_type('application/json');
                    echo json_encode($message);
                    exit;
                } else {
                    $mitra_name = ($get_mitra_info->mitra_name) ? $get_mitra_info->mitra_name : "";
                    $email      = ($get_mitra_info->email) ? $get_mitra_info->email : "";
                    $telp       = ($get_mitra_info->phone_no) ? $get_mitra_info->phone_no : "";
                    $email      = ($get_mitra_info->email) ? $get_mitra_info->email : "";
                    $_save_data = array(
                        'buyer_type'            => $data['buyer_type'],
                        'request_date'          => NOW,
                        'title'                 => '',
                        'name'                  => '',
                        'company'               => $mitra_name,
                        'telephone'             => $telp,
                        'email'                 => $email,
                        'ip_dev_1'              => $data['ip_dev_1'],
                        'ip_dev_2'              => $data['ip_dev_2'],
                        'ip_production'         => $data['ip_production'],
                        'protocols'             => $data['protocols'],
                        'ports'                 => $data['ports'],
                        'remark'                => $data['remark'],
                        'agree_nda_check'       => $data['agree_nda_check'],
                        'agree_ip_whitelist'    => $data['agree_ip_whitelist'],
                        'change_request'        => $data['change_request'],
                    );


                    $file_name_nda = $mitra_name.'_'.date('d-m-Y')."_NDA_".time();
                    $file_name_nda = str_replace(" ", "_", $file_name_nda);

                    $file_name_ip = $mitra_name.'_'.date('d-m-Y')."_IP_".time();
                    $file_name_ip = str_replace(" ", "_", $file_name_ip);

                    $pdf_nda = $this->generate_nda_pdf($file_name_nda);
                    $pdf_ip  = $this->generate_ip_pdf($file_name_ip);

                    $this->M_member->insert('users_document_det', array(
                        'doc_name'      => $pdf_nda['nama_file'],
                        'created_date'  => NOW,
                        'modified_date' => NOW,
                        'user_id'       => $this->ion_auth->user()->row()->id,
                        'type'          => 1
                    ));

                    $this->M_member->insert('users_document_det', array(
                        'doc_name'      => $pdf_ip['nama_file'],
                        'created_date'  => NOW,
                        'modified_date' => NOW,
                        'user_id'       => $this->ion_auth->user()->row()->id,
                        'type'          => 1
                    ));

                    if($data['change_request'] == TEMPORARY) {
                        $_save_data['temp_start_date'] = date('Y-m-d',strtotime($data['temp_start_date']));
                        $_save_data['temp_end_date']   = date('Y-m-d',strtotime($data['temp_end_date']));
                    } 
                }
                
            } else if($data['buyer_type'] == WHITELABEL) {
                if($check_buyer_whitelabel) {
                    $message['is_error']    = true;
                    $message['error_msg']   = "Tidak bisa melakukan request, Anda sudah request sebelumnya sebagai buyer (WHITELABEL)";
                    $message['redirect_to'] = "";

                    $this->output->set_content_type('application/json');
                    echo json_encode($message);
                    exit;
                } else if(empty($get_mitra_info)) {
                    $message['is_error']    = true;
                    $message['error_msg']   = "Tidak bisa melakukan request, Silahkan isi informasi mitra";
                    $message['redirect_to'] = "";

                    $this->output->set_content_type('application/json');
                    echo json_encode($message);
                    exit;
                } else {
                    $mitra_name = ($get_mitra_info->mitra_name) ? $get_mitra_info->mitra_name : "";
                    $email      = ($get_mitra_info->email) ? $get_mitra_info->email : "";
                    $telp       = ($get_mitra_info->phone_no) ? $get_mitra_info->phone_no : "";
                    $email      = ($get_mitra_info->email) ? $get_mitra_info->email : "";

                    $_save_data = array(
                        'buyer_type'   => $data['buyer_type'],
                        'request_date' => NOW
                    );

                    $file_name_wl = $mitra_name.'_'.date('d-m-Y')."_WHITE_LABEL_".time();
                    $file_name_wl = str_replace(" ", "_", $file_name_wl);

                    $pdf_nda = $this->generate_whitelabel_pdf($file_name_wl);

                    $this->M_member->insert('users_document_det', array(
                        'doc_name'      => $pdf_nda['nama_file'],
                        'created_date'  => NOW,
                        'modified_date' => NOW,
                        'user_id'       => $this->ion_auth->user()->row()->id,
                        'type'          => 1
                    ));

                }
            } else {
                if($check_buyer_ta) {
                    $message['is_error']    = true;
                    $message['error_msg']   = "Tidak bisa melakukan request, Anda sudah request sebelumnya sebagai buyer (TRAVELAGENT)";
                    $message['redirect_to'] = "";
                    
                    $this->output->set_content_type('application/json');
                    echo json_encode($message);
                    exit;
                } else if(empty($get_mitra_info)) {
                    $message['is_error']    = true;
                    $message['error_msg']   = "Tidak bisa melakukan request, Silahkan isi informasi mitra";
                    $message['redirect_to'] = "";

                    $this->output->set_content_type('application/json');
                    echo json_encode($message);
                    exit;
                } else {
                    $mitra_name = ($get_mitra_info->mitra_name) ? $get_mitra_info->mitra_name : "";
                    $email      = ($get_mitra_info->email) ? $get_mitra_info->email : "";
                    $telp       = ($get_mitra_info->phone_no) ? $get_mitra_info->phone_no : "";
                    $email      = ($get_mitra_info->email) ? $get_mitra_info->email : "";

                    $_save_data = array(
                        'buyer_type'   => $data['buyer_type'],
                        'request_date' => NOW
                    );

                    $file_name_ta = $mitra_name.'_'.date('d-m-Y')."_TRAVEL_AGENT_".time();
                    $file_name_ta = str_replace(" ", "_", $file_name_ta);

                    $pdf_nda = $this->generate_ta_pdf($file_name_ta);

                    $this->M_member->insert('users_document_det', array(
                        'doc_name'      => $pdf_nda['nama_file'],
                        'created_date'  => NOW,
                        'modified_date' => NOW,
                        'user_id'       => $this->ion_auth->user()->row()->id,
                        'type'          => 1
                    ));
                }
            }

            // print_r($this->input->post());die();
            //insert or update?
            if ($id == "") {
                //save table request
                $_save_data_request = array(
                    'type'                  => BUYER,
                    'user_id'               => $this->ion_auth->user()->row()->id,
                    'agree_policy_check'    => $data['agree_policy_check_buyer'],
                    'status_request'        => WAITING,
                    'request_date'          => NOW,
                    'created_at'            => NOW,
                    'updated_at'            => NOW
                );

                $request_id = $this->M_member->insert('users_requestv2', $_save_data_request);

                $_save_data['request_id']   = $request_id;
                $_save_data['user_id']      = $this->ion_auth->user()->row()->id;
                $_save_data['request_date'] = NOW;
                $_save_data['created_at']   = NOW; 
                $_save_data['updated_at']   = NOW; 

                $result = $this->M_member->insert('users_buyer',$_save_data);

                //end transaction
                if($this->db->trans_status() == false ) {
                    //balikin jangan di insert
                    $this->db->trans_rollback();
                } else {
                    $this->db->trans_commit();
                    //success
                    $message['is_error']        = false;
                    $message['notif_title']     = 'Success!';
                    $message['notif_message']   = 'Request has been submited';
                    $message['redirect_to']     = site_url();
                }
            } else {

                //end transaction.
                // if ($this->db->trans_status() === FALSE) {
                //     $this->db->trans_rollback();
                //     $message['error_msg'] = 'Insert failed! Please try again.';
                // } else {
                //     $this->db->trans_commit();
                //     //growler.
                //     $message['is_error'] = false;
                //     $message['notif_title'] = "Excellent!";
                //     $message['notif_message'] = "Article has been updated.";

                //     //on update, redirect.
                //     $message['redirect_to'] = site_url('manager/article/');
                // }
            }
        }
        //encoding and returning.
        $this->output->set_content_type('application/json');
        echo json_encode($message);
        exit;
    }

    /**
     * [submit_seller]
     * @return 
     */
    public function submit_seller()
    {
        $this->load->model(array('M_member','Global_model'));
        $data = $this->input->post();
        $request_id = array();
        $get_mitra_info = $this->Global_model->set_model('users_mitra','um','id')->mode(array(
            'type' => 'single_row',
            'conditions' => array(
                'user_id' => $this->ion_auth->user()->row()->id
            ),
            'return_object' => true
        ));

        $get_doc_info = $this->Global_model->set_model('users_document','ud','id')->mode(array(
            'type' => 'single_row',
            'conditions' => array(
                'user_id' => $this->ion_auth->user()->row()->id
            ),
            'return_object' => true
        ));

        $get_contact_info = $this->Global_model->set_model('users_contact','uc','contact_id')->mode(array(
            'type' => 'single_row',
            'conditions' => array(
                'user_id' => $this->ion_auth->user()->row()->id
            ),
            'return_object' => true
        ));

        $get_bank_info = $this->Global_model->set_model('users_bank','ub','bank_id')->mode(array(
            'type' => 'single_row',
            'conditions' => array(
                'user_id' => $this->ion_auth->user()->row()->id
            ),
            'return_object' => true
        ));

        $check_request = $this->Global_model->set_model('users_requestv2','ur','id')->mode(array(
            'type' => 'single_row',
            'conditions' => array(
                'ur.user_id' => $this->ion_auth->user()->row()->id
            )
        ));

        $link_kontak = '<a href="#kontak" data-toggle="tab"><strong><u>kontak Perwakilan</u></strong></a>';

        if( empty($get_mitra_info) ) {
            $this->session->set_flashdata('save_status', 'error');
            $this->session->set_flashdata('save_message', 'Tidak bisa melakukan request isi terlebih dahulu informasi mitra');
        } elseif( empty($get_doc_info) ) {
            $this->session->set_flashdata('save_status', 'error');
            $this->session->set_flashdata('save_message', 'Tidak bisa melakukan request silahkan upload document');
        } elseif( empty($get_contact_info) ) {
            $this->session->set_flashdata('save_status', 'error');
            $this->session->set_flashdata('save_message', 'Tidak bisa melakukan request isi terlebih dahulu informasi '.$link_kontak.'');
        } elseif( empty($get_bank_info) ) {
            $this->session->set_flashdata('save_status', 'error');
            $this->session->set_flashdata('save_message', 'Tidak bisa melakukan request isi terlebih dahulu informasi rekening bank');
        } else if( !empty($check_request)) {
            $this->session->set_flashdata('save_status', 'error');
            $this->session->set_flashdata('save_message', 'Tidak bisa melakukan request, Anda sudah melakukan request sebagai seller sebelumnya');
        } else {

            $_save_data_request = array(
                'type'                  => SELLER,
                'user_id'               => $this->ion_auth->user()->row()->id,
                'agree_policy_check'    => $data['agree_policy_check_seller'],
                'status_request'        => WAITING,
                'request_date'          => NOW,
                'created_at'            => NOW,
                'updated_at'            => NOW
            );

            $request_id = $this->M_member->insert('users_requestv2', $_save_data_request);
            $file_name_seller = $mitra_name.'_'.date('d-m-Y')."_SELLER";
            $file_name_seller = str_replace(" ", "_", $file_name_seller);

            $pdf_seller  = $this->generate_seller_pdf($file_name_seller);

            $this->M_member->insert('users_document_det', array(
                'doc_name'      => $pdf_seller['nama_file'],
                'created_date'  => NOW,
                'modified_date' => NOW,
                'user_id'       => $this->ion_auth->user()->row()->id,
                'type'          => 1
            ));
            $this->session->set_flashdata('save_status', 'success');
            $this->session->set_flashdata('save_message', 'Success Request');
        }
        redirect('member/personalData','refresh');
    }

    /**
     * [myrequest]
     * @return 
     */
    public function myrequest()
    {
        $this->load->model('Global_model');

        $data = $this->m_general->loadGeneralData();
        $data['title_table'] = "List My Request";
        $data['reques'] = $this->Global_model->set_model('users_requestv2','ur','id')->mode(array(
            'type' => 'all_data',
            'select' => 'ur.*, ub.buyer_type',
            'left_joined' => array(
                'users_buyer ub' => array(
                    'ub.request_id' => 'ur.id' 
                ) 
            ),
            'conditions' => array(
                'ur.user_id' => $this->ion_auth->user()->row()->id
            ),
            'debug_query' => false
        ));

        $this->load->view('member/my-request', $data);
    }

    public function cancel_request()
    {
        $id = $this->input->post('id');

        if( !empty($id) ) {
            
        }
    }

    /**
     * [generate_nda_pdf with domppdf]
     * @author didi <[diditriawan13@gmail.com]>
     * @return [filename] 
     */
    public function generate_nda_pdf($filename = '')
    {
        $this->load->model('Global_model');
        $data['mitra'] = $this->Global_model->set_model('users_mitra','um','id')->mode(array(
            'type' => 'single_row',
            'conditions' => array(
                'user_id' => $this->ion_auth->user()->row()->id
            )
        ));

        $html = $this->load->view('generate_pdf_nda',$data,true);
        $html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
        $dompdf = new DOMPDF();
        $dompdf->load_html($html);
        $dompdf->render();
        $output = $dompdf->output();

        $direktori = 'assets/generate_pdf/';

        if(!is_dir($direktori)) {
            mkdir($direktori, 0777, TRUE);
        }

        file_put_contents($direktori.$filename.'.pdf', $output);

        return array(
            'nama_file' => $filename.'.pdf'
        );
    }

    /**
     * [generate_ip_pdf with domppdf]
     * @author didi <[diditriawan13@gmail.com]>
     * @return [filename] 
     */
    public function generate_ip_pdf($filename = '')
    {
        $this->load->model('Global_model');
        $data['ip_whitelist'] = $this->Global_model->set_model('users_buyer','ub','id')->mode(array(
            'type' => 'single_row',
            'select' => 'ub.*, um.mitra_name,um.brand,u.first_name,u.last_name',
            'joined' => array(
                'users_mitra um' => array(
                    'um.user_id' => 'ub.user_id'
                ),
                'users u' => array(
                    'u.id' => 'um.user_id'
                )
            ),
            'conditions' => array(
                'ub.user_id' => $this->ion_auth->user()->row()->id
            )
        ));

        $html = $this->load->view('generate_pdf_ip',$data,true);
        $html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
        $dompdf = new DOMPDF();
        $dompdf->load_html($html);
        $dompdf->render();
        $output = $dompdf->output();

        $direktori = 'assets/generate_pdf/';

        if(!is_dir($direktori)) {
            mkdir($direktori, 0777, TRUE);
        }

        file_put_contents($direktori.$filename.'.pdf', $output);

        return array(
            'nama_file' => $filename.'.pdf'
        );
    }

    /**
     * [generate_ip_pdf with domppdf]
     * @author didi <[diditriawan13@gmail.com]>
     * @return [filename] 
     */
    public function generate_seller_pdf($filename = '')
    {
        $this->load->model('Global_model');
        $data['seller'] = $this->Global_model->set_model('users','u','id')->mode(array(
            'type' => 'single_row',
            'select' => 
                    'u.*, 
                    um.email as email_mitra,
                    um.mitra_name,
                    um.owner,
                    um.phone_no,
                    um.mobile_no,
                    um.address,
                    um.city,
                    um.province,
                    um.website,
                    uc.name as name_contact,
                    uc.email as email_contact,
                    uc.phone as phone_contact,
                    uc.mobile,
                    uc.name_ops,
                    uc.email_ops,
                    uc.phone_ops,
                    uc.mobile_ops,
                    ub.*',
            'left_joined' => array(
                'users_mitra um' => array(
                    'um.user_id' => 'u.id'
                ),
                'users_contact uc' => array(
                    'u.id' => 'uc.user_id'
                ),
                'users_bank ub' => array(
                    'ub.user_id' => 'u.id'
                )
            ),
            'conditions' => array(
                'u.id' => $this->ion_auth->user()->row()->id
            ),
            'debug_query' => false
        ));

        $html = $this->load->view('generate_pdf_seller',$data,true);
        $html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
        $dompdf = new DOMPDF();
        $dompdf->load_html($html);
        $dompdf->render();
        $output = $dompdf->output();

        $direktori = 'assets/generate_pdf/';

        if(!is_dir($direktori)) {
            mkdir($direktori, 0777, TRUE);
        }

        file_put_contents($direktori.$filename.'.pdf', $output);

        return array(
            'nama_file' => $filename.'.pdf'
        );
    }

    /**
     * [generate_ip_pdf with domppdf]
     * @author didi <[diditriawan13@gmail.com]>
     * @return [filename] 
     */
    public function generate_whitelabel_pdf($filename = '')
    {
        $this->load->model('Global_model');
        $data['whitelabel'] = $this->Global_model->set_model('users','u','id')->mode(array(
            'type' => 'single_row',
            'select' => 
                    'u.*, 
                    um.email as email_mitra,
                    um.mitra_name,
                    um.owner,
                    um.phone_no,
                    um.mobile_no,
                    um.address,
                    um.city,
                    um.province,
                    um.website,
                    uc.name as name_contact,
                    uc.email as email_contact,
                    uc.phone as phone_contact,
                    uc.mobile,
                    uc.name_ops,
                    uc.email_ops,
                    uc.phone_ops,
                    uc.mobile_ops,
                    ub.*',
            'left_joined' => array(
                'users_mitra um' => array(
                    'um.user_id' => 'u.id'
                ),
                'users_contact uc' => array(
                    'u.id' => 'uc.user_id'
                ),
                'users_bank ub' => array(
                    'ub.user_id' => 'u.id'
                )
            ),
            'conditions' => array(
                'u.id' => $this->ion_auth->user()->row()->id
            ),
            'debug_query' => false
        ));

        $html = $this->load->view('generate_pdf_ip',$data,true);
        $html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
        $dompdf = new DOMPDF();
        $dompdf->load_html($html);
        $dompdf->render();
        $output = $dompdf->output();

        $direktori = 'assets/generate_pdf/';

        if(!is_dir($direktori)) {
            mkdir($direktori, 0777, TRUE);
        }

        file_put_contents($direktori.$filename.'.pdf', $output);

        return array(
            'nama_file' => $filename.'.pdf'
        );
    }

    /**
     * [generate_ip_pdf with domppdf]
     * @author didi <[diditriawan13@gmail.com]>
     * @return [filename] 
     */
    public function generate_ta_pdf($filename = '')
    {
        $this->load->model('Global_model');
        $data['travel_agent'] = $this->Global_model->set_model('users','u','id')->mode(array(
            'type' => 'single_row',
            'select' => 
                    'u.*, 
                    um.email as email_mitra,
                    um.mitra_name,
                    um.owner,
                    um.phone_no,
                    um.mobile_no,
                    um.address,
                    um.city,
                    um.province,
                    um.website,
                    uc.name as name_contact,
                    uc.email as email_contact,
                    uc.phone as phone_contact,
                    uc.mobile,
                    uc.name_ops,
                    uc.email_ops,
                    uc.phone_ops,
                    uc.mobile_ops,
                    ub.*',
            'left_joined' => array(
                'users_mitra um' => array(
                    'um.user_id' => 'u.id'
                ),
                'users_contact uc' => array(
                    'u.id' => 'uc.user_id'
                ),
                'users_bank ub' => array(
                    'ub.user_id' => 'u.id'
                )
            ),
            'conditions' => array(
                'u.id' => $this->ion_auth->user()->row()->id
            ),
            'debug_query' => false
        ));

        $html = $this->load->view('generate_pdf_ta',$data,true);
        $html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
        $dompdf = new DOMPDF();
        $dompdf->load_html($html);
        $dompdf->render();
        $output = $dompdf->output();

        $direktori = 'assets/generate_pdf/';

        if(!is_dir($direktori)) {
            mkdir($direktori, 0777, TRUE);
        }

        file_put_contents($direktori.$filename.'.pdf', $output);

        return array(
            'nama_file' => $filename.'.pdf'
        );
    }

    public function example(){

        $this->load->model('Global_model');
        $data['seller'] = $this->Global_model->set_model('users','u','id')->mode(array(
            'type' => 'single_row',
            'select' => 
                    'u.*, 
                    um.email as email_mitra,
                    um.mitra_name,
                    um.owner,
                    um.phone_no,
                    um.mobile_no,
                    um.address,
                    um.city,
                    um.province,
                    um.website,
                    uc.name as name_contact,
                    uc.email as email_contact,
                    uc.phone as phone_contact,
                    uc.mobile,
                    uc.name_ops,
                    uc.email_ops,
                    uc.phone_ops,
                    uc.mobile_ops,
                    ub.*',
            'left_joined' => array(
                'users_mitra um' => array(
                    'um.user_id' => 'u.id'
                ),
                'users_contact uc' => array(
                    'u.id' => 'uc.user_id'
                ),
                'users_bank ub' => array(
                    'ub.user_id' => 'u.id'
                )
            ),
            'conditions' => array(
                'u.id' => $this->ion_auth->user()->row()->id
            ),
            'debug_query' => false
        ));

        // print_r($data['seller']);die();
        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-petanikode.pdf";
        $this->pdf->load_view('generate_pdf_whitelabel', $data);

    }
}