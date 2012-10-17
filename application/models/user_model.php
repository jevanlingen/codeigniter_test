<?php
class User_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();		
		$this->load->library('encrypt');
	}
	
	function login($username, $password)
	{	
		$this->db->select('id, username, password');
		$this->db->from('users');
		$this->db->where('username = ' . "'" . $username . "'");
		$this->db->where('password = ' . "'" . $this->encrypt->sha1($password) . "'");
		$this->db->limit(1);
				
		$query = $this->db->get();
		
		if($query->num_rows() == 1)
	    {
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	function create_account($username, $password)
	{
		$query = $this->db->get_where('users',array('username'=>$username));
		
		if ($query->num_rows() > 0)
		{
			return "Username does already exist, choose a other username!";
		}
		else
		{
			$data = array(
					  'username'=>$username,
					  'password'=>$this->encrypt->sha1($password)
					);
			$this->db->insert('users',$data);
			
			return "Account has been created!";
		}
	}
}