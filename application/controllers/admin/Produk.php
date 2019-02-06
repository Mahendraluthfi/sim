<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->auth->is_logged_in() == false)
	    {	     
	        redirect('admin/login');
	    }
	    $this->load->model('mproduk');
	}

	public function index()
	{
		$data['row'] = $this->db->get('produk')->result();
		$data['content'] = 'produk';
		$this->load->view('index', $data);		
	
	}

	public function save()
	{
		$nmfile = 'IMG-'.date('dHis'); 		
		$config['upload_path']          = './asset/foto/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2048;
        $config['max_width']            = 1900;
        $config['max_height']           = 1200;
        $config['file_name'] 			= $nmfile;         

        $this->load->library('upload', $config);

        if (!empty($_FILES['file']['name'])) {
	        if ( ! $this->upload->do_upload('file')){
	            $error = array('error' => $this->upload->display_errors());
	            //$this->load->view('upload_form', $error);
	            echo $error['error'];
	        }else{
	            $data = $this->upload->data();
	            $tmpname1 = $data['file_name'];
	            //$this->load->view('upload_success', $data);
	            //echo "sukses";
	        }
	    }else{
	    	$tmpname1 = '';
	    }
	    
	    $data = array(
	    	'nama_produk' => $this->input->post('namaproduk'),
	    	'harga' => $this->input->post('harga'),
	    	'detail' => $this->input->post('detail'),
	    	'foto' => $tmpname1	    	
	    );

	    $this->db->insert('produk', $data);		
	    redirect('admin/produk','refresh');
	}

	public function edit($id)
	{
		$nmfile = 'IMG-'.date('dHis'); 		
		$config['upload_path']          = './asset/foto/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2048;
        $config['max_width']            = 1900;
        $config['max_height']           = 1200;
        $config['file_name'] 			= $nmfile;         

        $this->load->library('upload', $config);

        if (!empty($_FILES['file']['name'])) {
	        if ( ! $this->upload->do_upload('file')){
	            $error = array('error' => $this->upload->display_errors());
	            //$this->load->view('upload_form', $error);
	            echo $error['error'];
	        }else{
	            $data = $this->upload->data();
	            $tmpname1 = $data['file_name'];
			    $data = array(
			    	'nama_produk' => $this->input->post('namaproduk'),
			    	'harga' => $this->input->post('harga'),
			    	'detail' => $this->input->post('detail'),
			    	'foto' => $tmpname1	    	
			    );
	            
	        }
	    }else{
	    	$data = array(
			    	'nama_produk' => $this->input->post('namaproduk'),
			    	'harga' => $this->input->post('harga'),
			    	'detail' => $this->input->post('detail')			    	
			    );
	    }
	    
	    $this->db->where('id_produk', $id);
	    $this->db->update('produk', $data);
	    redirect('admin/produk','refresh');	
	}

	public function get($id)
	{
		$data = $this->db->get_where('produk',array('id_produk' => $id))->row();
		echo json_encode($data);
	}

	public function delete($id)
	{
		$this->db->where('id_produk', $id);
		$this->db->delete('produk');
		redirect('admin/produk','refresh');
	}

	public function row($id)
	{
		$data['prod'] = $this->db->get_where('produk', array('id_produk' => $id))->row();
		$data['option'] = $this->mproduk->get_option($id)->result();
		$data['row'] = $this->mproduk->get_row($id)->result();
		$data['content'] = 'row';
		$this->load->view('index', $data);		
	}

	public function save_bahan()
	{
		$this->db->insert('material_produk', array(
			'id_produk' => $this->input->post('id'),
			'id_bahan' => $this->input->post('bahan'),
			'jumlah' => $this->input->post('jml')
		));
		redirect('admin/produk/row/'.$this->input->post('id'),'refresh');
	}

	public function delete_material($id,$url)
	{
		$this->db->where('id_material', $id);
		$this->db->delete('material_produk');
		redirect('admin/produk/row/'.$url,'refresh');		
	}

}

/* End of file Produk.php */
/* Location: ./application/controllers/admin/Produk.php */