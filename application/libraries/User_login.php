<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//session_start();
class User_login{
 	
	function check_page_is_allowed()
	{
		$CI =& get_instance();
  		$CI->load->library('session');
	
  		if($CI->session->userdata('logged_in'))
	    {
			$session_data = $CI->session->userdata('logged_in');			
			return $session_data;
		}
		else
		{
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
 	}
}

/* End of file User_login.php */
/* Location: ./application/libraries/User_login.php */