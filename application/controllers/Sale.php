<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		$data['content'] = 'home';
		$this->load->view('frontend', $data);
	}

}

/* End of file Sale.php */
/* Location: ./application/controllers/Sale.php */