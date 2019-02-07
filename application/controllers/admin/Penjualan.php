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

	public function get($id)
	{
		$data = $this->mpenjualan->get_detail($id)->result();
		echo json_encode($data);
	}

	public function get1($id)
	{
		$data = $this->db->get_where('member',array('id_member' => $id))->row();
		echo json_encode($data);		
	}

	public function save_ongkir($id)
	{
		$ongkir = $this->input->post('ongkir');		
		$this->db->query("UPDATE penjualan SET total = total + '$ongkir', ongkir = '$ongkir', status = 'MENUNGGU PEMBAYARAN' WHERE kode_penjualan='$id'");
		echo json_encode(array('status' => 'TRUE'));
	}

	public function kirim($id)
	{
		$this->db->where('kode_penjualan', $id);
		$this->db->update('penjualan', array('status' => 'DIKIRIM'));
		redirect('admin/penjualan','refresh');
	}

	public function hapus($id)
	{
		$stok = $this->db->get_where('detail_penjualan', array('kode_penjualan' => $id));
		foreach ($stok->result() as $key) {
			$this->db->query("UPDATE produk SET stok = stok + '$key->jml' WHERE id_produk='$key->id_produk'");
		}
		$this->db->where('kode_penjualan', $id);
		$this->db->delete('detail_penjualan');
		$this->db->where('kode_penjualan', $id);
		$this->db->delete('penjualan');
		redirect('admin/penjualan','refresh');
	}
}

/* End of file Penjualan.php */
/* Location: ./application/controllers/admin/Penjualan.php */