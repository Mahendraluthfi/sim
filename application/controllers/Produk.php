<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index($offset=0)
	{
		$jml = $this->db->get('produk');
		$config['base_url'] = base_url().'produk/index';
		$config['total_rows'] = $jml->num_rows();
		$config['per_page'] = 8;
		$config['uri_segment'] = 3;		
		$choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

		$config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';        
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);
		$data['offset'] = $offset;
		$data['halaman'] = $this->pagination->create_links();
		$data['get'] = $this->db->get('produk',$config['per_page'], $offset)->result();
		$data['content'] = 'v_produk';
		$this->load->view('frontend', $data);
		// $data['get'] = $this->m_daftar->get_peserta($config['per_page'], $offset)->result();		
	}

	public function get($id)
	{
		$data = $this->db->get_where('produk', array('id_produk' => $id))->row();
		echo json_encode($data);
	}
	
	public function add_shop($id)
	{
		$data = array(
			'id_member' => $this->session->userdata('member'),
			'id_produk' => $id,
			'jml' => $this->input->post('jml')
		);
		$this->db->insert('shopping_cart', $data);
    	$shop = $this->db->get_where('shopping_cart', array('id_member' => $this->session->userdata('member')))->num_rows();		
		$array = array(
			'count' => $shop
		);		
		$this->session->set_userdata( $array );
		echo json_encode(array('status' => 'TRUE'));
	}
}

/* End of file Produk.php */
/* Location: ./application/controllers/Produk.php */