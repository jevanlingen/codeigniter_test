<?php
class Books_model extends CI_Model {

    public function __construct()
	{
		$this->load->database();
		$this->load->helper('url');
	}
    
    function general()
	{
		$this->load->library('My_menu');
		
		$data['menu']        = $this->my_menu->show_menu();
		$data['base']		 = $this->config->item('base_url');
		$data['css']		 = $this->config->item('css');
		$data['webtitle']	 = 'Book Collection';
  		$data['websubtitle'] = 'We collect all title of books on the world';
  		$data['webfooter']	 = '© copyright by step by step php tutorial';
		
		$data['title']	 	= 'Title';
		$data['author']	 	= 'Author';
		$data['publisher']	= 'Publisher';				
		$data['year']	 	= 'Year';
		$data['years']	 	= array('2007'=>'2007',
									'2008'=>'2008',
									'2009'=>'2009');
		$data['available']	= 'Available';	
		$data['summary']	= 'Summary';
		$data['forminput']  = 'Form Input';
		$data['fid']['value']       = 0;
		$data['fyear']['value']     = 0;

		
		$data['ftitle']		= array('name'=>'title',
									'size'=>30);
		$data['fauthor']	= array('name'=>'author',
									'size'=>30);
		$data['fpublisher']	= array('name'=>'publisher',
									'size'=>30);
		$data['favailable']	= array('name'=>'available',
									'value'=>'yes',
									'checked'=>TRUE);
		$data['fsummary']	= array('name'=>'summary',
									'rows'=>5,
									'cols'=>30);
		
		return $data;
	}
	
	function entry_insert()
	{
		$session_data = $this->session->userdata('logged_in');
		
		$data = array(
				  'title'=>$this->input->post('title'),
				  'author'=>$this->input->post('author'),
				  'publisher'=>$this->input->post('publisher'),
				  'year'=>$this->input->post('year'),
				  'available'=>$this->input->post('available'),
				  'summary'=>$this->input->post('summary'),
				  'user_id'=>$session_data['id']
				);
		$this->db->insert('books',$data);
	}
	
	function get_books()
	{
		$this->load->library('table');
	
		$session_data = $this->session->userdata('logged_in');
		$query = $this->db->query('SELECT id, title, author, publisher, year, available, summary FROM books WHERE user_id = "'.$session_data['id'].'"');
		
		$array = array_values($query->result_array());
		
		if ($query->num_rows() > 0)
		{
			foreach ($array as $key => $row)
			{
			   $row['edit'] = anchor('books/input/'.$row['id'].'/','Edit');
			   $row['delete'] = anchor('books/del/'.$row['id'].'/','Delete');
			   
			   $array[$key] = $row;
			}
			
			$this->table->set_heading(array_keys($array['0']));
			$table = $this->table->generate($array);
			return $table;
		}
	}
	
	 function get($id)
	 {
		//$session_data = $this->session->userdata('logged_in')
		$query = $this->db->get_where('books',array('id'=>$id));
		return $query->row_array();		  
	 }
	 
	  function entry_update()
	  {
		$data = array
		(
			'title'=>$this->input->post('title'),
			'author'=>$this->input->post('author'),
			'publisher'=>$this->input->post('publisher'),
			'year'=>$this->input->post('year'),
			'available'=>$this->input->post('available'),
			'summary'=>$this->input->post('summary')
		);
	
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('books',$data);  
	 }
	 
	 function delete($id)
	 {
		$session_data = $this->session->userdata('logged_in');
		$query = $this->db->get_where('books',array('id'=>$id, 'user_id'=>$session_data['id']));
		
		if($query->num_rows() > 0)
		{
			$this->db->delete('books',array('id'=>$id));
		}
	 }
}