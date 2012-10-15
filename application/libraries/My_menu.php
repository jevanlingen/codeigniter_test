<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_menu{
 	
	function show_menu()
	{
  		$CI =& get_instance();
  		$CI->load->helper('url');
		
  		$menu  = "<ul>";
  		$menu .= "<li>";
  		$menu .= anchor("books/main","List of Books");
  		$menu .= "</li>";
  		$menu .= "<li>";		
  		$menu .= anchor("books/input","Input Book");		
  		$menu .= "</li>";		
  		$menu .= "</ul>";
		
  		return $menu;
 	}
}

/* End of file My_menu.php */
/* Location: ./application/libraries/My_menu.php */