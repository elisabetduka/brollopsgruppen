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

		if($this->db->insert('image', $data)){
			return true;
		} 
	}
	
	function save_sidebar($image_id, $position){
		$id_string = '';
		foreach($image_id as $id){
				$id_string = $id . ',' . $id_string;	
		}
		$id_string = substr_replace($id_string, '', -1);
		$data = array(
			'image_ids' => $id_string
		); 

		
		if($position == 'left'){
			$position = 'sidebar_left';
		} else {
			$position = 'sidebar_right';
		}
			
			$this->db->where(array('type' => $position));
			$this->db->update('sidebar', $data);
		
		/* if(count($image_id) != 1 ){
			$id_string = "";
			foreach($image_id as $id){
				$id_string = $id . ' AND( id != ' . $id_string;
				
				$lenght = strlen($id_string);
				//echo $lenght; 
				 
				
				
			}
			$lenght = $lenght -1;
			$id_string = substr_replace($id_string, '', -12);
		} else {
			foreach($image_id as $id){
				$id_string = $id;
			}
		} */

			/* $this->db->query("UPDATE image SET importance = 0 WHERE  id != $id_string
AND type = 'sidebar_right')"); */
		
		
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
	
		function update_gallery($file_name, $file_path, $position){
		$data = array(
			'name' => $file_name, 
			'imglink' => $file_path,
			'type' => $position
		);

		if($this->db->insert('image', $data)){
			return true;
		} 
	}
	
	function save_gallery($image_id, $position){
		$id_string = '';
		foreach($image_id as $id){
				$id_string = $id . ',' . $id_string;	
		}
		$id_string = substr_replace($id_string, '', -1);
		$data = array(
			'image_ids' => $id_string
		); 
			
			$this->db->where(array('type' => $position));
			$this->db->update('gallery', $data);
			
	}
	
}
