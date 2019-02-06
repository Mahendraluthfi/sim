<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjahit extends CI_Controller {

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
		$data['row'] = $this->db->get('penjahit')->result();
		$data['content'] = 'penjahit';
		$this->load->view('index', $data);		
	
	}

		public function save()
	{
		$data = array(				
			'nama_penjahit' => $this->input->post('namapenjahit'),
			'alamat' => $this->input->post('alamat'),
			'telepon' => $this->input->post('telepon'),
			'upah' => $this->input->post('upah')			
		);
		$this->db->insert('penjahit', $data);		
		echo json_encode(array('status' => TRUE));
	}

	public function edit($id)
	{
		$data = array(				
			'nama_penjahit' => $this->input->post('namapenjahit'),
			'alamat' => $this->input->post('alamat'),
			'telepon' => $this->input->post('telepon'),
			'upah' => $this->input->post('upah')			
		);
		$this->db->where('id_penjahit', $id);
		$this->db->update('penjahit', $data);
		echo json_encode(array('status' => TRUE));
	}

	public function get($id)
	{
		$data = $this->db->get_where('penjahit', array('id_penjahit' => $id))->row();
		echo json_encode($data);
	}

	public function delete($id)
	{
		$this->db->where('id_penjahit', $id);
		$this->db->delete('penjahit');
		redirect('admin/penjahit','refresh');
	}

}

/* End of file Penjahit.php */
/* Location: ./application/controllers/admin/Penjahit.php */