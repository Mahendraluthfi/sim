<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mproduk extends CI_Model {

	public function get_option($id)
		{			
			$db = $this->db->query("SELECT * FROM bahan_baku WHERE NOT id_bahan IN (SELECT id_bahan FROM material_produk WHERE id_produk='$id')");
			return $db;
		}	

	public function get_row($id)
	{
		$this->db->select('*');
		$this->db->from('material_produk');
		$this->db->join('bahan_baku', 'bahan_baku.id_bahan = material_produk.id_bahan');		
		$this->db->where('material_produk.id_produk', $id);
		$db = $this->db->get();
		return $db;
	}
}

/* End of file Mproduk.php */
/* Location: ./application/models/Mproduk.php */