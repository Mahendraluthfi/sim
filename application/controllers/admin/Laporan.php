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
	    $this->load->model('mlaporan');
	}

	public function index()
	{				
		$data['content'] = 'laporan';
		$this->load->view('index', $data);			
	}

	public function produksi()
	{
		$dt = $this->input->post();
		$data['content'] = 'laporan_produksi';
		$data['ta'] = $dt['ta'];
		$data['tb'] = $dt['tb'];
		$data['result'] = $this->mlaporan->produksi($dt['ta'],$dt['tb'])->result();
		$this->load->view('index', $data);
	}

	public function penjualan()
	{
		$dt = $this->input->post();
		$data['content'] = 'laporan_penjualan';
		$data['ta'] = $dt['ta'];
		$data['tb'] = $dt['tb'];
		$data['result'] = $this->mlaporan->penjualan($dt['ta'],$dt['tb'])->result();
		$this->load->view('index', $data);
	}
}

/* End of file Laporan.php */
/* Location: ./application/controllers/admin/Laporan.php */