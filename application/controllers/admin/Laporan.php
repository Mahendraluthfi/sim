<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->auth->is_logged_in() == false)
	    {	     
	        redirect('admin/login');
	    }	    
	}

	public function index()
	{				
		$data['content'] = 'laporan';
		$this->load->view('index', $data);			
	}

}

/* End of file Laporan.php */
/* Location: ./application/controllers/admin/Laporan.php */