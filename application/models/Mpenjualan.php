<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpenjualan extends CI_Model {

	public function get()
	{
		$this->db->select('*, penjualan.status as sts');
		$this->db->from('penjualan');
		$this->db->join('member', 'member.id_member = penjualan.id_member');
		$db = $this->db->get();
		return $db;
	}

	public function get_member($id)
	{
		$this->db->select('*, penjualan.status as sts');
		$this->db->from('penjualan');
		$this->db->join('member', 'member.id_member = penjualan.id_member');
		$this->db->where('penjualan.id_member', $id);
		$db = $this->db->get();
		return $db;
	}

	public function get_detail($id)
	{
		$this->db->select('*, (detail_penjualan.jml * produk.harga) as sub ');
		$this->db->from('detail_penjualan');
		$this->db->join('produk', 'produk.id_produk = detail_penjualan.id_produk');
		$this->db->where('detail_penjualan.kode_penjualan', $id);
		$db = $this->db->get();
		return $db;
	}

	public function get_bayar($id)
	{
		$this->db->select('*');
		$this->db->from('penjualan');
		$this->db->join('konfirmasi', 'konfirmasi.kode_penjualan = penjualan.kode_penjualan');
		$this->db->where('penjualan.kode_penjualan', $id);
		$db = $this->db->get();
		return $db;
	}
}

/* End of file Mpenjualan.php */
/* Location: ./application/models/Mpenjualan.php */