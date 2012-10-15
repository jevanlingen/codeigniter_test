<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('employee_model');
	}
	
	public function index()
	{
		$data['query'] = $this->employee_model->get_employees();
		$this->load->view('employee', $data);
	}
	
	public function get($id)
	{
		$data['query'] = $this->employee_model->get_employee($id);
		$this->load->view('employee', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/employee.php */