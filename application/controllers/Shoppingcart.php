<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shoppingcart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('member'))) {
			redirect('sale','refresh');
		}
		$this->load->model('mshop');
	}

	public function index()
	{
		$data['show'] = $this->mshop->get($this->session->userdata('member'))->result();
		$data['content'] = 'shoppingcart';
		$this->load->view('frontend', $data);
	}

	public function get($id)
	{
		$data = $this->mshop->get_jml_order($id)->row();
		echo json_encode($data);
	}

	public function edit($id)
	{
		$this->db->where('id', $id);
		$this->db->update('shopping_cart', array('jml' => $this->input->post('jml')));
		echo json_encode(array('status' => 'TRUE'));
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('shopping_cart');
		redirect('shoppingcart','refresh');
	}

}

/* End of file Shoppingcart.php */
/* Location: ./application/controllers/Shoppingcart.php */