<?php

class Admin_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}
	
	function update_footer($content){
		$data = array(
               'content' => $content,
            );
		if($this->db->update('footer', $data)){
			return true;
		}
	}
	
	function get_footer_content(){
		$result = $this->db->get('footer');
		
		$result_array[] = NULL;
		foreach ($result->result() as $row){
			$result_array[] = $row->content;
		}
		return $result_array;
	}
	
	function update_page($id, $title, $content){
		$data = array(
			'title' => $title,
            'content' => $content
        );
		$this->db->where('id', $id);
		if($this->db->update('page', $data)){
			return true;
		} 
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
	
	function create_page($title, $content){
		$data = array(
		   'title' => $title ,
		   'content' => $content
		);

		if($this->db->insert('page', $data)){
			return true;
		}
	}
	
	function update_header($file_name, $file_path){
		$data = array(
			'name' => $file_name, 
			'imglink' => $file_path
		);
		$this->db->where('id', 1);
		if($this->db->update('image', $data)){
			return true;
		} 
		
	}
	
}