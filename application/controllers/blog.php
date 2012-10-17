<?php

class Blog extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('blog_model');
		$this->user_login->check_page_is_allowed();
	}

	public function index()
	{
		$data['title'] = 'BLOG SHIT';
		$data['todo_list'] = array('Clean House', 'Call Mom', 'Run Errands');
		$data['query'] = $this->blog_model->get_last_ten_entries();
	
		$this->load->view('templates/header', $data);
		$this->load->view('blog/index', $data);		
		$this->load->view('templates/footer');
	}
	
	public function comments()
	{
		echo 'Look at this!';
	}
}