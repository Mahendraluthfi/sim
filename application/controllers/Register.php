<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{
		
	}

	public function daftar()
	{
		$post = $this->input->post();
		$data = array(
			'username' => $post['username'],
			'password' => md5($post['password']),
            'nama_member' => $post['nama'],
			'email' => $post['email'],
			'alamat' => $post['alamat'],
			'telepon' => $post['telepon']
		);
		$this->db->insert('member', $data);
		$this->session->set_flashdata('msg','
                <div class="alert alert-primary" role="alert">
                  Pendaftaran Berhasil !
                </div>
                ');       
		echo json_encode(array('status' => 'TRUE'));
	}

	public function login()
	{
		$username = $this->input->post('username');
        $password = md5($this->input->post('password'));        
        // echo $username;
        $cek = $this->db->query("SELECT * FROM member WHERE username='$username' AND password='$password' AND status='1'");
        if (!empty($cek->num_rows())) {           
            $get = $cek->result();
            foreach ($get as $key) {            
            	$shop = $this->db->get_where('shopping_cart', array('id_member' => $key->id_member))->num_rows();
                $ses_admin = array(
                    'member' => $key->id_member,                    
                    'nama' => $key->nama_member,
                    'count' => $shop                 
                );
            }         
            $this->session->set_userdata($ses_admin);            
            redirect('sale','refresh');
            // echo "Ok";
        }else{     
            $this->session->set_flashdata('msg','
                <div class="alert alert-danger" role="alert">
                  <b>Username or Password Wrong</b>
                </div>
                ');       
            redirect('sale');
            // echo "no";
        }
	}

	public function logout()
	{
		session_destroy();
		redirect('sale','refresh');
	}

}

/* End of file Register.php */
/* Location: ./application/controllers/Register.php */