<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlaporan extends CI_Model {

	public function produksi($ta,$tb)
	{
		$this->db->select('*');
		$this->db->from('produksi');
		$this->db->join('produk', 'produk.id_produk = produksi.id_produk');
		$this->db->where('produksi.tanggal >=', $ta);
		$this->db->where('produksi.tanggal <=', $tb);
		$db = $this->db->get();
		return $db;

	}

	public function penjualan($ta,$tb)
	{
		$this->db->select('*, penjualan.status as sts');
		$this->db->from('penjualan');
		$this->db->join('detail_penjualan', 'detail_penjualan.kode_penjualan = penjualan.kode_penjualan');
		$this->db->join('produk', 'produk.id_produk = detail_penjualan.id_produk');
		$this->db->join('member', 'member.id_member = penjualan.id_member');
		$this->db->where('penjualan.date >=', $ta);
		$this->db->where('penjualan.date <=', $tb);
		$db = $this->db->get();
		return $db;

	}

}

/* End of file Mlaporan.php */
/* Location: ./application/models/Mlaporan.php */