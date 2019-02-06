<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function index()
	{
		$data['get'] = $this->db->get_where('member', array('id_member' => $this->session->userdata('member')))->row();
		$data['content'] = 'profil';
		$this->load->view('frontend', $data);		
	}

	public function save()
	{
		$post = $this->input->post();
		$data = array(
			'username' => $post['username'],			
            'nama_member' => $post['nama'],
			'email' => $post['email'],
			'alamat' => $post['alamat'],
			'telepon' => $post['telepon']
		);
		$this->db->where('id_member', $this->session->userdata('member'));
		$this->db->update('member', $data);
		redirect('profil','refresh');
	}

}

/* End of file Profil.php */
/* Location: ./application/controllers/Profil.php */