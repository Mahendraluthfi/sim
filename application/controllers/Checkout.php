<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('member'))) {
			redirect('sale','refresh');
		}
		$this->load->model('mshop');
	}

	public function index()
	{		
		$data['people'] = $this->db->get_where('member', array('id_member' => $this->session->userdata('member')))->row();
		$data['show'] = $this->mshop->get($this->session->userdata('member'))->result();		
		$data['content'] = 'checkout';
		$this->load->view('frontend', $data);
	}

	public function acak($long)
	{
		$char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$string = '';
		for ($i=0; $i < $long; $i++) { 
			# code...
			$pos = rand(0, strlen($char)-1);
			$string .= $char{$pos};
		}
		return $string;
	}

	public function result()
	{
		$kode_penjualan = 'Order-'.$this->acak(12);
		$data1 = array(
			'kode_penjualan' => $kode_penjualan,
			'id_member' => $this->session->userdata('member'),
			'date' => date('Y-m-d'),
			'total_item' => $this->input->post('total'),
			'total' => $this->input->post('total'),
			'status' => 'PROSES'
		);
		$this->db->insert('penjualan', $data1);
		$shop = $this->db->get_where('shopping_cart', array('id_member' => $this->session->userdata('member')));
		foreach ($shop->result() as $key) {
			$isi = array(
				'kode_penjualan' => $kode_penjualan,
				'id_produk' => $key->id_produk,
				'jml' => $key->jml
			);
			$this->db->insert('detail_penjualan', $isi);
			$this->db->query("UPDATE produk SET stok = stok - '$key->jml' WHERE id_produk='$key->id_produk'");
		}

		$this->db->where('id_member', $this->session->userdata('member'));
		$this->db->delete('shopping_cart');
		$this->session->unset_userdata('count');
		redirect('emailcoba/index/'.$kode_penjualan,'refresh');

	}
	
}

/* End of file Checkout.php */
/* Location: ./application/controllers/Checkout.php */