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
		
/*
	function create_page($title, $content){
		$data = array(
		   'title' => $title ,
		   'content' => $content
		);

		if($this->db->insert('page', $data)){
			return true;
		}
	}
*/
	
	function update_header($file_name, $file_path, $position){
		$data = array(
			'name' => $file_name, 
			'imglink' => $file_path,
			'type' => $position
		);
		$this->db->where('id', 1);
		if($this->db->update('image', $data)){
			return true;
		} 
		
	}
	
	function update_sidebar($file_name, $file_path, $position){
		if($position == 'left'){
			$position = sidebar_left;
		} else {
			$position = sidebar_right;
		}
		$data = array(
			'name' => $file_name, 
			'imglink' => $file_path,
			'type' => $position
		);

		$this->db->where('id', 1);
		if($this->db->insert('image', $data)){
			return true;
		} 
	}
	
	function save_sidebar($image_id, $position){
		$data = array(
			'importance' => 1
		);
		foreach($image_id as $id){
			
			$this->db->where(array('id' => $id));
			$this->db->update('image', $data);
		}
		
	}
		
	function create_question($question, $category){
		$data = array(
			'question' => $question,
			'category' => $category
		);
		
		if($this->db->insert('question', $data)){
			return true;
		}
	}
	
	
	function delete_question($id){
		if($this->db->delete('question', array('id' => $id))){
			return true;
		}
	}
	
}
