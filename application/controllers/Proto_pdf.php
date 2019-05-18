<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proto_pdf extends CI_Controller {

	public function index()
	{
		$this->load->view('generate_pdf_nda');
	}

	public function pdf_ip()
	{
		$this->load->view('generate_pdf_ip');
	}

	public function pdf_seller()
	{
		$this->load->view('generate_pdf_seller');
	}

}

/* End of file Proto_pdf.php */
/* Location: ./application/controllers/Proto_pdf.php */