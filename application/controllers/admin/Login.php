<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		if($this->auth->is_logged_in() == false){          
        	$this->load->view('login');
        }else{
            redirect('admin','refresh');
        }	
	}

	public function submit()
	{
		$username = $this->input->post('username');
        $password = md5($this->input->post('password'));        
        $cek = $this->db->get_where('user', array('username' => $username,'password' => $password));
        if (!empty($cek->num_rows())) {           
            $get = $cek->result();
            foreach ($get as $key) {            
                $ses_admin = array(
                    'id_user' => $key->username,                    
                    'role' => $key->level                 
                );
            }         
            $this->session->set_userdata($ses_admin);            
            redirect('admin','refresh');
        }else{     
            $this->session->set_flashdata('msg','
                <div class="alert alert-danger" role="alert">
                  Username or Password Wrong
                </div>
                ');       
            redirect('admin/login');
        }
	}

	public function logout()
	{
		session_destroy();
		redirect('admin','refresh');
	}


}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */