<?php

class Hello extends CI_Controller {
	
	var $name;
	var $color;

	public function __construct()
	{
		parent::__construct();
		$this->name = 'Andy';
		$this->color = 'red';
	}

	public function index($firstname='', $lastname='')
	{
		$data['name'] = ($firstname) ? $firstname.' '.$lastname : $this->name;
		$data['color'] = $this->color;
		$this->load->view('hello_view', $data);
	}
}