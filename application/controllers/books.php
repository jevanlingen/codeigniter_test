<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Books extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('books_model');
		$this->session_data = $this->user_login->check_page_is_allowed();
	}
	
	public function main()
	{
		$this->load->library('table');
	
		$data = $this->books_model->general();
		$data['table'] = $this->books_model->get_books();
		
		$this->load->view('books/books_main', $data);
	}
	
	public function input($id = 0)
	{
		$this->load->helper('form');
		$this->load->helper('html');
		
		if($this->input->post('mysubmit'))
		{
			if($this->input->post('id')){
				$this->books_model->entry_update();	  
			}else{
				$this->books_model->entry_insert();
			}
		}
					
		$data = $this->books_model->general();
		
		if((int)$id > 0){
			$book = $this->books_model->get($id);
			
			if(empty($book) OR $book['user_id'] !== $this->session_data['id'])
			{
				$this->main();
				return FALSE;
			}
						
			$data['fid']['value'] = $book['id'];
			$data['ftitle']['value'] = $book['title'];
			$data['fauthor']['value'] = $book['author'];
			$data['fpublisher']['value'] = $book['publisher'];
			$data['fyear']['value'] = $book['year'];
			
			if($book['available']=='yes')
			{
				$data['favailable']['checked'] = TRUE;
			} else
			{
				$data['favailable']['checked'] = FALSE;	  
			}
		
			$data['fsummary']['value'] = $book['summary'];
		}
		
		$this->load->view('books/books_input', $data);
	}
	
	function del($id)
	{
		if((int)$id > 0)
		{
			$this->books_model->delete($id);
		}

		$this->main();  
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/books.php */