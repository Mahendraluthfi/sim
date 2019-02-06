<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	class EmailCoba extends CI_Controller {
		/**
		 * @author Praneeth Nidarshan
		 * @see git@gist.github.com:8d54499e903d35155af6.git
		 */

		public function __construct()
		{
			parent::__construct();
			$this->load->model('mshop');			
		}
		public function index($id='')
		{
			$get = $this->db->get_where('penjualan', array('kode_penjualan' => $id))->row();
			$member = $this->db->get_where('member', array('id_member' => $get->id_member))->row();
			$detail = $this->mshop->email_list($id)->result();
			$sender_email = "faizcollection05@gmail.com";
			$user_password = "P455w0rd";
			$username = "Faiz Collection";
			$receiver_email = array(
				"nakamahendra26@gmail.com",
				$member->email				
			);
			$subject = 'Konfirmasi Pemesanan : '.$get->kode_penjualan;
			$message .= "
				<h3>".$id."</h3>
				<h4>Tanggal : ".$get->date."</h4>
				<h3>".$member->nama_member."</h3>
				".$member->alamat."<br>
				".$member->telepon."<br>
				<table>					
						<tr>
							<td><h3>Total Harga Item</h3></td>
							<td>:</td>
							<td><h3>".number_format($get->total_item)."</h3></td>
						</tr>	
						<tr>
							<td><h3>Status</h3></td>
							<td>:</td>
							<td><h3>".$get->status."</h3></td>
						</tr>											
						<tr>
							<td></td>
							<td></td>
							<td><i>Harga belum termasuk ongkos kirim. Total Harga akan dikonfirmasi pada menu pemesanan</i></td>
						</tr>											
				</table><p></p>
				<h4>Detail Pemesanan</h4>
				<table border='1' style='border-collapse:collapse; width: auto;' cellpadding='3' cellspacing='3'>			
					<tr>
						<th>Nama Produk</th>
						<th>Jumlah</th>
						<th>Harga</th>
						<th>Subtotal</th>
					</tr>";
				foreach ($detail as $key) {
					$sub = $key->jml * $key->harga;					
					$message .=	"<tr>
							<td>".$key->nama_produk."</td>
							<td>".$key->jml."</td>
							<td>".$key->harga."</td>
							<td>".$sub."</td>
						</tr>";
				}
				$message .= "</table>";
				
							
			
			$this->emailConfig();
			// Sender email address
			$this->email->from($sender_email, $username);
			// Receiver email address.for single email
			$this->email->to($receiver_email);
			//send multiple email
			// $this->email->to("abc@gmail.com,xyz@gmail.com,jkl@gmail.com");
			// Subject of email
			$this->email->subject($subject);
			// Message in email
			$this->email->message($message);
			// It returns boolean TRUE or FALSE based on success or failure
			
			$mail = ($this->email->send()) ? "Sent" : "Failed" ;
			echo $this->email->print_debugger();
			
			redirect('sale','refresh');
		}
		
		/**
		 * Email Configurations
		 * ** Please deactivate Second-step verification for the smtp_user **
		 */
		private function emailConfig()
		{
			$config = array(
				'protocol' 	=> 'smtp' , 
				'smtp_host' => 'ssl://smtp.googlemail.com' , 
				'smtp_port' => 465 , 
				'smtp_user' => 'faizcollection05@gmail.com' ,
				'smtp_pass' => 'P455w0rd',
				'mailtype'	=> 'html', 
				'charset' 	=> 'utf-8', 
				'newline' 	=> "\r\n",  
				'wordwrap' 	=> TRUE 
				);
			
			// Load email library and passing configured values to email library
			$this->load->library('email',$config);
		}
	}
?>