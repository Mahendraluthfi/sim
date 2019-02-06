<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth
{
	var $ci = NULL;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	function is_logged_in(){
      if($this->ci->session->userdata('id_user') == '' && $this->ci->session->userdata('user_name') == '' && $this->ci->session->userdata('role') == ''){
         return false;
      }      
      return true;
   }
      
   function restrict(){
      if($this->is_logged_in() == false){
         redirect(base_url());
      }
   }
   
  

}

/* End of file Auth.php */
/* Location: ./application/libraries/Auth.php */
