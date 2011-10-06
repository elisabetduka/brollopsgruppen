<?php

class Admin_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}
	
	function update_footer($content){
		$data = array(
               'content' => $content,
            );
		$this->db->update('footer', $data); 
	}
	
	function get_footer_content(){
		$result = $this->db->get('footer');
		
		$result_array[] = NULL;
		foreach ($result->result() as $row){
			$result_array[] = $row->content;
		}
		return $result_array;
	}
	
}