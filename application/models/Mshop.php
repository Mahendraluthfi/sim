<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mshop extends CI_Model {

	public function get($id)
		{
			$this->db->select('*');
			$this->db->from('shopping_cart');
			$this->db->join('produk', 'produk.id_produk = shopping_cart.id_produk');
			$this->db->where('shopping_cart.id_member', $id);
			$db = $this->db->get();
			return $db;
		}	

	public function get_jml_order($id)
	{
		$this->db->select('*');
		$this->db->from('shopping_cart');
		$this->db->join('produk', 'produk.id_produk = shopping_cart.id_produk');
		$this->db->where('shopping_cart.id', $id);
		$db = $this->db->get();
		return $db;
	}

	public function email_list($id)
	{
		$this->db->select('*');
		$this->db->from('detail_penjualan');
		$this->db->join('produk', 'produk.id_produk = detail_penjualan.id_produk');		
		$this->db->where('detail_penjualan.kode_penjualan', $id);
		$db = $this->db->get();
		return $db;
	}

}

/* End of file Mshop.php */
/* Location: ./application/models/Mshop.php */