<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mupah extends CI_Model {

	public function tampil()
		{
			$this->db->select('*');
			$this->db->from('payroll');
			$this->db->join('penjahit', 'penjahit.id_penjahit = payroll.id_penjahit');
			$db = $this->db->get();
			return $db;
		}	

	public function get($id)
	{
		$this->db->select('*');
		$this->db->from('payroll');
		$this->db->join('penjahit', 'penjahit.id_penjahit = payroll.id_penjahit');
		$this->db->where('id_payroll', $id);
		$db = $this->db->get();
		return $db;
	}
}

/* End of file Mupah.php */
/* Location: ./application/models/Mupah.php */