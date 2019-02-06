<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

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
		$data['row'] = $this->db->get_where('member', array('status' => '1'))->result();
		$data['content'] = 'member';
		$this->load->view('index', $data);				
	}


}

/* End of file Member.php */
/* Location: ./application/controllers/admin/Member.php */