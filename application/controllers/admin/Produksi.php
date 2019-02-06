<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->auth->is_logged_in() == false)
	    {	     
	        redirect('admin/login');
	    }	    
	    $this->load->model('mproduksi');
	}

	public function index()
	{		
		$data['row'] = $this->mproduksi->show()->result();
		$data['content'] = 'produksi';
		$this->load->view('index', $data);			
	}

	public function acak($long)
	{
		$char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$string = '';
		for ($i=0; $i < $long; $i++) { 
			# code...
			$pos = rand(0, strlen($char)-1);
			$string .= $char{$pos};
		}
		return $string;
	}

	public function createsession($id='')
	{
		
		if (!empty($id)) {
			$x = $this->db->get_where('produksi', array('kode_produksi' => $id))->row();
			$array = array(
				'kp' => $id,
				'date' => $x->tanggal
			);		
			$this->session->set_userdata($array);							
		}elseif (empty($this->session->userdata('kp')) || !empty($this->session->userdata('date')) ) {
			$array = array(
				'kp' => 'P-'.$this->acak(7)
			);		
			$this->session->set_userdata($array);							
		}
		redirect('admin/produksi/form','refresh');		
	}

	public function form()
	{
		$data['option'] = $this->mproduksi->option($this->session->userdata('kp'))->result();
		$data['row'] = $this->mproduksi->showlist($this->session->userdata('kp'))->result();
		$data['content'] = 'produksi_form';
		$this->load->view('index', $data);				
	}

	public function save_produk()
	{
		$data = array(
			'kode_produksi' => $this->session->userdata('kp'),
			'id_produk' => $this->input->post('produk'),
			'total_produksi' => $this->input->post('jml')
		);
		$this->db->insert('produksi', $data);
		redirect('admin/produksi/form','refresh');
	}

	public function save_produksi()
	{
		$this->db->where('kode_produksi', $this->session->userdata('kp'));
		$this->db->update('produksi', array('tanggal' => $this->input->post('tgl')));
		$array = array('kp','date');
		$this->session->unset_userdata($array);
		redirect('admin/produksi','refresh');
	}

	public function hapus_produk($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('produksi');
		redirect('admin/produksi/form','refresh');		
	}

	public function delete($id)
	{
		$this->db->where('kode_produksi', $id);
		$this->db->delete('produksi');
		redirect('admin/produksi','refresh');		
	}

	public function get1($id)
	{
		$data = $this->mproduksi->showlist($id)->result();
		echo json_encode($data);
	}

	public function get2($id)
	{
		$data = $this->mproduksi->get($id)->result();
		echo json_encode($data);
	}

	public function cetak($id)
	{
		$data['kode'] = $id;
		$data['row1'] = $this->mproduksi->showlist($id)->result();
		$data['row2'] = $this->mproduksi->get($id)->result();
		$this->load->view('print', $data);
		
	}

	public function validasi()
	{
		$id = $this->input->post('id_produksi');
		foreach ($id as $key => $value) {
			$this->db->where('id', $key);
			$this->db->update('produksi', array(
				'total_produksi' => $value,
				'status' => '1'
			));
			$row = $this->db->get_where('produksi', array('id' => $key))->row();
			$this->db->query("UPDATE produk SET stok = stok + '$value' WHERE id_produk = '$row->id_produk'");
		}
		redirect('admin/produksi','refresh');
	}


	// SELECT *, SUM(produksi.total_produksi * material_produk.jumlah) AS total FROM produksi LEFT JOIN material_produk ON produksi.id_produk=material_produk.id_produk GROUP BY material_produk.id_bahan
}

/* End of file Produksi.php */
/* Location: ./application/controllers/admin/Produksi.php */