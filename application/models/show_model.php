<?php

class Show_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}
	
	function get_footer_content(){
		$result = $this->db->get('footer');
		
		$result_array[] = NULL;
		foreach ($result->result() as $row){
			$result_array[] = $row->content;
		}
		return $result_array;
	}
	
	
	function get_page_content($id){
		$result = $this->db->get_where('page', array('id' => $id));
		
		$result_array[] = NULL;
		foreach($result->result() as $row){
			$result_array[] = $row;
		}
		return $result_array;
	}
	
	function get_pages(){
		$result = $this->db->get('page');
		
		$result_array[] = NULL;
		foreach($result->result() as $row){
			$result_array[] = $row;
		}
		return $result_array;
	}
	function get_header(){
		$result = $this->db->get('image');
		
		$result_array[] = NULL;
		foreach($result->result() as $row){
			$result_array[] = $row;
		}
		return $result_array;
	}
	
	function get_questions(){
		$result = $this->db->get('question');
		
		$result_array = array();
		foreach($result->result() as $row){
			$result_array[$row->category][] = $row;
		}
		return $result_array;
	}
}
