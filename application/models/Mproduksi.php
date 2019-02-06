<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mproduksi extends CI_Model {

	public function show()
	{
		$this->db->select('*, SUM(total_produksi) as ttl');
		$this->db->from('produksi');
		$this->db->group_by('kode_produksi');
		$db = $this->db->get();
		return $db;
	}	

	public function option($id)
	{
		$db = $this->db->query("SELECT * FROM produk WHERE NOT id_produk IN (SELECT id_produk FROM produksi WHERE kode_produksi='$id')");
		return $db;
	}

	public function showlist($id)
	{
		$this->db->select('*');
		$this->db->from('produksi');
		$this->db->join('produk', 'produk.id_produk = produksi.id_produk');
		$this->db->where('produksi.kode_produksi', $id);
		$db = $this->db->get();
		return $db;
	}
	
	public function get($id)
		{
			// SELECT *, SUM(produksi.total_produksi * material_produk.jumlah) AS total FROM produksi LEFT JOIN material_produk ON produksi.id_produk=material_produk.id_produk GROUP BY material_produk.id_bahan
			$this->db->select('*, SUM(produksi.total_produksi * material_produk.jumlah) AS total');
			$this->db->from('produksi');
			$this->db->join('material_produk', 'material_produk.id_produk = produksi.id_produk', 'left');
			$this->db->join('bahan_baku', 'material_produk.id_bahan = bahan_baku.id_bahan');
			$this->db->where('produksi.kode_produksi', $id);
			$this->db->group_by('material_produk.id_bahan');
			$db = $this->db->get();
			return $db;
		}	
}

/* End of file Mproduksi.php */
/* Location: ./application/models/Mproduksi.php */