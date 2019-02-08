<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {

	public function index()
	{
		$data['content'] = 'tentang';
		$this->load->view('frontend', $data);
	}

}

/* End of file Tentang.php */
/* Location: ./application/controllers/Tentang.php */