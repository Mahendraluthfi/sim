<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahanbaku extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->auth->is_logged_in() == false)
	    {	     
	        redirect('admin/login');
	    }
	}

	public function index()
	{
		$data['row'] = $this->db->get('bahan_baku')->result();
		$data['content'] = 'bahanbaku';
		$this->load->view('index', $data);		
	
	}

	public function save()
	{
		$data = array(				
			'nama_bahan' => $this->input->post('namabahan'),
			'satuan' => $this->input->post('satuan')			
		);
		$this->db->insert('bahan_baku', $data);		
		echo json_encode(array('status' => TRUE));
	}

	public function edit($id)
	{
		$data = array(				
			'nama_bahan' => $this->input->post('namabahan'),
			'satuan' => $this->input->post('satuan')			
		);
		$this->db->where('id_bahan', $id);
		$this->db->update('bahan_baku', $data);
		echo json_encode(array('status' => TRUE));
	}

	public function get($id)
	{
		$data = $this->db->get_where('bahan_baku', array('id_bahan' => $id))->row();
		echo json_encode($data);
	}

	public function delete($id)
	{
		$this->db->where('id_bahan', $id);
		$this->db->delete('bahan_baku');
		redirect('admin/bahanbaku','refresh');
	}
}

/* End of file Bahanbaku.php */
/* Location: ./application/controllers/admin/Bahanbaku.php */