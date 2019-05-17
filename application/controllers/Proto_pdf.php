<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proto_pdf extends CI_Controller {

	public function index()
	{
		$this->load->view('proto_pdf');
	}

	public function table()
	{
		$this->load->view('proto_table_pdf');
	}

}

/* End of file Proto_pdf.php */
/* Location: ./application/controllers/Proto_pdf.php */