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
	
	function update_left_sidebar($file_name, $file_path){
		$data = array(
			'name' => $file_name, 
			'imglink' => $file_path
		);
/*
		//fast den ska ju inte skriva över gamla bilder väl? utan 
		//fast den ska ju inte skriva över gamla bilder väl? utan 
		$this->db->where('id', 1);
		if($this->db->update('image', $data)){
			return true;
		} 
*/
		
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
