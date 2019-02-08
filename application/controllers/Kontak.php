<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

	public function index()
	{
		$data['content'] = 'kontak';
		$this->load->view('frontend', $data);
	}

}

/* End of file Kontak.php */
/* Location: ./application/controllers/Kontak.php */