<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function index()
 {
   $session_data = $this->user_login->check_page_is_allowed();
   $data['username'] = $session_data['username'];
   $this->load->view('home', $data);
 }

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   $this->session->sess_destroy();
   redirect('home', 'refresh');
 }

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */