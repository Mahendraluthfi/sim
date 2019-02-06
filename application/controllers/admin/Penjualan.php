<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->auth->is_logged_in() == false)
	    {	     
	        redirect('admin/login');
	    }
	    $this->load->model('mpenjualan');
	}

	public function index()
	{		
		$data['show'] = $this->mpenjualan->get()->result();
		$data['content'] = 'penjualan';
		$this->load->view('index', $data);			
	}

}

/* End of file Penjualan.php */
/* Location: ./application/controllers/admin/Penjualan.php */