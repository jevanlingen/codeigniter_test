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
		$this->load->helper(array('form', 'html', 'url'));	
					
		$data = $this->books_model->general();
		
		if($this->input->post('mysubmit'))
		{		
			$this->load->library('form_validation');
		
			$this->form_validation->set_rules('title', 'title', 'trim|required|xss_clean');
		
			if($this->form_validation->run() == FALSE)
			{
				$data = $this->fiil_book_data($data, $_POST);		
			
				$this->load->view('books/books_input', $data);
				return FALSE;
			}
		
			if($this->input->post('id')){
				$this->books_model->entry_update();	  
			}else{
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '80';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';
				
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload())
				{
					$data['error'] = $this->upload->display_errors();
					
					$data = $this->fiil_book_data($data, $_POST);
					$this->load->view('books/books_input', $data);
					return FALSE;
				}
				
				$this->books_model->entry_insert();
			}
		}
		
		if((int)$id > 0){
			$book = $this->books_model->get($id);
			
			if(empty($book) OR $book['user_id'] !== $this->session_data['id'])
			{
				$this->main();
				return FALSE;
			}
			
			$data = $this->fiil_book_data($data, $book);
		}
		
		$this->load->view('books/books_input', $data);
	}
	
	public function del($id)
	{
		if((int)$id > 0)
		{
			$this->books_model->delete($id);
		}

		$this->main();  
	}
	
	function fiil_book_data($data, $book)
	{	
		$data['fid']['value'] = $book['id'];
		$data['ftitle']['value'] = $book['title'];
		$data['fauthor']['value'] = $book['author'];
		$data['fpublisher']['value'] = $book['publisher'];
		$data['fyear']['value'] = $book['year'];
		
		if(isset($book['available']) AND $book['available']=='yes')
		{
			$data['favailable']['checked'] = TRUE;
		} else
		{
			$data['favailable']['checked'] = FALSE;	  
		}
	
		$data['fsummary']['value'] = $book['summary'];
		
		return $data;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/books.php */