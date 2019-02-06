<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upah extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->auth->is_logged_in() == false)
	    {	     
	        redirect('admin/login');
	    }
	    $this->load->model('mupah');
	}

	public function index()
	{		
		$data['penjahit'] = $this->db->get('penjahit')->result();
		$data['show'] = $this->mupah->tampil()->result();
		$data['content'] = 'upah';
		$this->load->view('index', $data);		
	}

	public function save()
	{
		$search = $this->db->get_where('penjahit', array('id_penjahit' => $this->input->post('penjahit')))->row();
		$total = $search->upah * $this->input->post('jml');
		$data = array(
			'date' => $this->input->post('date'),
			'id_penjahit' => $this->input->post('penjahit'),
			'jml_item' => $this->input->post('jml'),
			'total_upah' => $total
		);
		$this->db->insert('payroll', $data);
		echo json_encode(array('status' => 'TRUE'));
	}

	public function get($id)
	{
		$data = $this->mupah->get($id)->row();
		echo json_encode($data);
	}

	public function delete($id)
	{
		$this->db->where('id_payroll', $id);
		$this->db->delete('payroll');
		redirect('admin/upah','refresh');
	}
}

/* End of file Upah.php */
/* Location: ./application/controllers/admin/Upah.php */