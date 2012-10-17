<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model','',TRUE);
	}
	
	public function index($message = "")
	{
		$data['message'] = $message;
		
		$this->load->helper(array('form'));
		$this->load->view('login_view', $data);
	}
	
	public function create_account()
	{	
		$message = $this->user_model->create_account($this->input->post('username'), $this->input->post('password'));
		
		$this->index($message);
	}
	
	public function login()
	{	
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
		
		if($this->form_validation->run() == FALSE)
		{
			//Field validation failed.  User redirected to login page
			$this->index();
		}
		else
		{
			redirect('home', 'refresh');
		}
	}
	
	function check_database($password)
	{
		//Field validation succeeded.  Validate against database
		$username = $this->input->post('username');

		//query the database
		$result = $this->user_model->login($username, $password);

		if($result)
		{
			$sess_array = array();
			foreach($result as $row)
			{
				$sess_array = array(
					'id' => $row->id,
					'username' => $row->username
				);
				$this->session->set_userdata('logged_in', $sess_array);
			}
			return TRUE;
	   }
	   else
	   {
			$this->form_validation->set_message('check_database', 'Invalid username or password');
			return false;
	   }
	 }
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */