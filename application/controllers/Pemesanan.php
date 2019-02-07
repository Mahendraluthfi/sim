<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('member'))) {
			redirect('sale','refresh');
		}
	    $this->load->model('mpenjualan');

	}

	public function index()
	{
		$id = $this->session->userdata('member');
		$data['show'] = $this->mpenjualan->get_member($id)->result();		
		$data['content'] = 'pemesanan';
		$this->load->view('frontend', $data);	
	}

	public function get($id)
	{
		$data = $this->db->get_where('penjualan', array('kode_penjualan' => $id))->row();	
		echo json_encode($data);
	}

	public function get1($id)
	{
		$data = $this->mpenjualan->get_bayar($id)->row();	
		echo json_encode($data);
	}

	public function konfirmasi()
	{
		$nmfile = 'IMG-'.date('dHis'); 		
		$config['upload_path']          = './asset/foto/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2048;
        $config['max_width']            = 1900;
        $config['max_height']           = 1200;
        $config['file_name'] 			= $nmfile;         

        $this->load->library('upload', $config);

        if (!empty($_FILES['file']['name'])) {
	        if ( ! $this->upload->do_upload('file')){
	            $error = array('error' => $this->upload->display_errors());
	            //$this->load->view('upload_form', $error);
	            echo $error['error'];
	        }else{
	            $data = $this->upload->data();
	            $tmpname1 = $data['file_name'];
	            //$this->load->view('upload_success', $data);
	            //echo "sukses";
	        }
	    }else{
	    	$tmpname1 = '';
	    }

	    $i = $this->input->post();
	    $data = array(
	    	'kode_penjualan' => $i['kodepenjualan'],
	    	'no_rekening' => $i['norek'],
	    	'atas_nama' => $i['atasnama'],
	    	'nominal' => $i['nominal'],
	    	'foto' => $tmpname1
	    );
	    $this->db->insert('konfirmasi', $data);

	    $this->db->where('kode_penjualan', $i['kodepenjualan']);
	    $this->db->update('penjualan', array('status' => 'KONFIRMASI PEMBAYARAN'));
	    redirect('pemesanan','refresh');
	}
}

/* End of file Pemesanan.php */
/* Location: ./application/controllers/Pemesanan.php */