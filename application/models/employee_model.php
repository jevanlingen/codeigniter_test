<?php
class Employee_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_employees()
	{
		$query = $this->db->get('employee');
		return $query->result();
	}
	
	public function get_employee($id)
	{
		$query = $this->db->get_where('employee', array('id' => $id));
		return $query->result();
	}
}