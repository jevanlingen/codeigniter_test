<?php
class Blog_model extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    public function __construct()
	{
		$this->load->database();
	}
    
    function get_last_ten_entries()
    {
        $query = $this->db->get('blog', 10);
        return $query->result();
    }

    function insert_entry()
    {
        $this->title   = $this->input->post('title'); // $_POST['title']; // please read the below note
        $this->content = $this->input->post('content'); // $_POST['content'];
        $this->date    = time();

        $this->db->insert('blog', $this);
    }

    function update_entry()
    {
        $this->title   = $this->input->post('title');
        $this->content = $this->input->post('content');
        $this->date    = time();

        $this->db->update('blog', $this, array('id' => $this->input->post('id')));
    }

}