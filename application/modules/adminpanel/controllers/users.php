<?php

class users extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library(['session', 'ion_auth', 'form_validation', 'general']);
        $this->general->saveVisitor($this, [2, 0]);
        if ( !$this->ion_auth->logged_in() || !$this->ion_auth->is_admin() || $this->ion_auth->user()->result()[0]->type > 4 )
    		redirect(base_url('adminpanel/login/logout'));
        $this->load->model('manages/m_manages');
    }

    function index(){

    	$data['HeaderBar'] = [
            'FaName'            => 'fa-edit',
            'LeftMenuTitle'     => 'Add New Users',
            'RightMenuTitle'    => [
                ['isUrl' => TRUE, 'Name' => 'Page', 'Url' => 'users'],
                ['isUrl' => FALSE,'Name' => 'Users'],
            ]
        ];
        $data = $this->globalFunction($data);

        $data['Member']         = $this->ion_auth->user()->row();
        $data['List']           = [];
        // $data['List']   = $this->m_manages->getListUsers();
        $Users = $this->ion_auth->users()->result();
        foreach ($Users as $key => $value) {
            $User = [
                'UserId'        => $value->id,
                'UserName'      => $value->username,
                'Email'         => $value->email,
                'FirstName'     => $value->first_name,
                'LastName'      => $value->last_name,
                'Group'         => $this->ion_auth->get_users_groups($value->id)->row()
            ];
            $data['List'][] = $User;
        }

        usort($data['List'], function($a, $b) {
            return $a['Group']->id - $b['Group']->id;
        });

        // echo "<pre>";
        // print_r($data['List']);
        // die();
        $this->load->view('adminpanel/users/all', $data);
    }

    public function add($UserId=false) {
        $data['HeaderBar'] = [
            'FaName'            => 'fa-edit',
            'LeftMenuTitle'     => 'Edit Users',
            'RightMenuTitle'    => [
                ['isUrl' => TRUE, 'Name' => 'Users', 'Url' => 'users/add'],
                ['isUrl' => FALSE,'Name' => 'Edit Users'],
            ]
        ];
        $data = $this->globalFunction($data);

        // $this->ion_auth->add_to_group(2, 3);

        // $data['UserGroup'] = $this->ion_auth->get_users_groups(6)->row();
        $MemberData = [];
        if ($UserId) {
            $Member         = $this->ion_auth->user($UserId)->row();
            if (!$Member) die('');


            $MemberData = [
                'MemberId'      => $Member->id,
                'UserName'      => $Member->username,
                'Email'         => $Member->email,
                'FirstName'     => $Member->first_name,
                'LastName'      => $Member->last_name,
                'Phone'         => $Member->phone,
                'Password'      => $Member->password,
                'Type'          => $Member->type,
                'Group'         => $this->ion_auth->get_users_groups($Member->id)->row()->id
            ];
        }
        $data['UserId']     = $UserId ? $UserId : 0;
        $data['MemberData'] = $MemberData;

        // echo "<pre>";
        // print_r($MemberData);
        // print_r($this->ion_auth->users()->result());
        // die();

        $this->load->view('adminpanel/users/add', $data);
    }

    public function requests(){
        $data['HeaderBar'] = [
            'FaName'            => 'fa-edit',
            'LeftMenuTitle'     => 'Users Request',
            'RightMenuTitle'    => [
                ['isUrl' => TRUE, 'Name' => 'Page', 'Url' => 'users'],
                ['isUrl' => FALSE,'Name' => 'User Requests'],
            ]
        ];
        $data = $this->globalFunction($data);

        $data['Member']         = $this->ion_auth->user()->row();
        $data['List']           = [];
        // $data['List']   = $this->m_manages->getListUsers();
        $Users = $this->ion_auth->users()->result();
        
        foreach ($Users as $key => $value) {
            $req = $this->db->query("select * from users_request where user_id='".$value->id."'")->row();
            $privySeller = $this->db->query("select * from users_privyid where user_id='".$value->id."' and type='seller'")->row();
            $privyBuyer = $this->db->query("select * from users_privyid where user_id='".$value->id."' and type='buyer'")->row();
            $User = [
                'UserId'        => $value->id,
                'UserName'      => $value->username,
                'Email'         => $value->email,
                'Phone'         => $value->phone,
                'FirstName'     => $value->first_name,
                'LastName'      => $value->last_name,
                'Nik'           => $value->nik,
                'Seller'     => $req ? $req->seller_status : 'undefined',
                'Buyer'      => $req ? $req->buyer_status : 'undefined',
                'PrivyIdSeller'   => $privySeller ? $privySeller->privy_id : 'empty',
                'PrivyIdBuyer'   => $privyBuyer ? $privyBuyer->privy_id : 'empty',
                'PrivyIdSellerStatus' => $privySeller ? ($privySeller->status ? $privySeller->status : 'empty') : 'empty',
                'PrivyIdBuyerStatus' => $privyBuyer ? ($privyBuyer->status ? $privyBuyer->status : 'empty') : 'empty',
                'Group'         => $this->ion_auth->get_users_groups($value->id)->row()
            ];
            $doc = $this->db->query("select * from users_document_det where user_id='".$value->id."'")->result();
            if($doc){
                foreach($doc as $k => $v){
                    $User['Document'][] = [
                        'id' => $v->doc_id,
                        'user_id' => $value->id,
                        'name' => $v->doc_name,
                        'status' => $v->status,
                        'owner' => [
                            'privyId' => 'TES001',
                            'enterpriseToken' => '41bc84b42c8543daf448d893c255be1dbdcc722e'
                        ],
                        'recipients' => [
                            [
                                'privyId' => 'TES001',
                                'type' => 'Reviewer',
                                'enterpriseToken' => '41bc84b42c8543daf448d893c255be1dbdcc722e'
                            ],
                            [
                                'privyId' => 'TES001',
                                'type' => 'Signer',
                                'enterpriseToken' => ''
                            ]
                        ]
                    ];
                    if($v && $v->status != 'undefined'){
                        $this->privyDocStatus($v->doc_id);
                    }
                }
            }
            $data['List'][] = $User;
            // echo json_encode($value);
            if($privySeller){
                $this->privyUserStatus($value->id, 'seller');
            }

            if($privyBuyer){
                $this->privyUserStatus($value->id, 'buyer');
            }
        }
        // echo json_encode($data['List']);
        // die();
        usort($data['List'], function($a, $b) {
            return $a['Group']->id - $b['Group']->id;
        });


        // echo "<pre>";
        // print_r($data['List']);
        // die();
        $this->load->view('adminpanel/users/requests', $data);
    }

    protected function globalFunction($data)
    {
        $data['MasterGeneral']         = $this->m_get->getRowDynamic([
            'select'    => 'favicon, logo',
            'from'      => 'v2_master_landingpage',
            'where'     => [
                'id' => 1
            ]
        ]);

    	$data['ViewHead'] 			= $this->load->view('adminpanel/template/head', $data, TRUE);
    	$data['ViewPreLoader'] 		= $this->load->view('adminpanel/template/preloader', [], TRUE);
    	$data['ViewFooter'] 		= $this->load->view('adminpanel/template/footer', [], TRUE);
    	$data['ViewLeftPanel'] 		= $this->load->view('adminpanel/template/left_panel', $data, TRUE);
    	$data['ViewHeaderBar'] 		= $this->load->view('adminpanel/template/header_bar', $data['HeaderBar'], TRUE);
    	$data['ViewCopyRight'] 		= $this->load->view('adminpanel/template/copyright', [], TRUE);
    	return $data;
    }

    public function privyUserStatus($userid, $type)
    {
        // $user = $this->ion_auth->user()->row();
        $privy = $this->db->query('select * from privyid_api')->row();
        $privyUser = $this->db->query('select * from users_privyid where user_id = "'.$userid.'"')->row();
        // $privyUserDet = $this->db->query('select * from users_privyid where user_id = "'.$userid.'" and type="'.$type.'"')->row();
        $url = $privy->base.$privy->reg_status;
        $data = [
            'auth' => [$privy->user,$privy->pass],
            'form_params' => [
                'token' => $privyUser ? $privyUser->token : '',
            ],
            'headers' => [
                'Merchant-Key' => $privy->merchant_key
            ]
        ];
        
        
        $this->load->library('privyid_api');
        $resp = $this->privyid_api->postPrivyAPI($url, $data);
        $r = json_decode($resp);
        // echo $resp;

        if($r->code == 201){
            $dataUpdate = [
                'table' => 'users_privyid',
                'where' => ['user_id' => $userid, 'type' => $type],
                'data'  => ['status' => strtolower($r->data->status)]
            ];

            if($type == 'seller'){
                $typestat = 'seller_status';
            }else{
                $typestat = 'buyer_status';
            }

            $dataUpdate2 = [
                'table' => 'users_request',
                'where' => ['user_id' => $userid],
                'data' => [ $typestat => strtolower($r->data->status)]
            ];
            $this->load->model('m_update');
            $this->m_update->updateDynamic($dataUpdate);
            $this->m_update->updateDynamic($dataUpdate2);
        }

    }
        

    public function privyDocStatus($docid)
    {
        $privy = $this->db->query('select * from privyid_api')->row();
        $doc = $this->db->query('select * from users_privyid_doc where doc_id = "'.$docid.'"')->row();
        $url = $privy->base.$privy->doc_status.'/'.$doc->doc_token;
        $data = [
            'auth' => [$privy->user,$privy->pass],
            'headers' => [
                'Merchant-Key' => $privy->merchant_key,
            ]
        ];
                
        $this->load->library('privyid_api');
        $resp = $this->privyid_api->getPrivyAPI($url, $data);
        $r = json_decode($resp);
        // echo $resp;
        if($r->code == 200){
            $dataUpdate = [
                'table' => 'users_privyid_doc',
                'where' => ['doc_id' => $docid],
                'data'  => ['status' => strtolower($r->data->documentStatus)]
            ];
            $dataUpdate2 = [
                'table' => 'users_document_det',
                'where' => ['doc_id' => $docid],
                'data'  => ['status' => strtolower($r->data->documentStatus)]
            ];

            $this->load->model('m_update');
            $this->m_update->updateDynamic($dataUpdate);
            $this->m_update->updateDynamic($dataUpdate2);
        }

    }


}