<?php

class User_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}
	
	function login($email, $password){
		return $this->simpleloginsecure->login($email, $password);
	}
	
	function logout(){
		$this->simpleloginsecure->logout();
	}
	
}