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

}

/* End of file Mpenjualan.php */
/* Location: ./application/models/Mpenjualan.php */