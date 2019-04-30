<?php

class privyid extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation', 'session', 'ion_auth', 'general'));
        $this->load->model('m_general');
        $this->general->saveVisitor($this, [1, 0]);
    }

    function tesGet()
    {
        $resp = [
            'no' => 1,
            'text'  => 'test'
        ];
        echo $resp;
    }
}