<?php

class Main_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}
	
	function save_question_answers($question_id, $name, $email, $phone){
		$data = array(
			'name' => $name,
			'email' => $email,
			'phone' => $phone
		);
		if($this->db->insert('customer', $data)){
			$query = $this->db->query("SELECT id FROM customer WHERE name = '$name' AND email = '$email'");
			
			foreach($query->result() as $row){
				$result = $row;
			}
			
			foreach($question_id as $q_id){
				$data = array(
					'question_id' => $q_id, 
					'customer_id' => $result->id
				);
				$this->db->insert('customer_answer_question', $data);
				
			}
		}
	}
	
	function save_contactform($subject, $message, $email, $phone){
		$data = array(
			'title' => $subject,
			'content' => $message,
			'email' => $email,
			'phone' => $phone
		);
		if($this->db->insert('contact', $data)){
			return true;
		}
	}
}