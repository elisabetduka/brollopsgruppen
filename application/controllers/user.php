<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index()
		{
			$this->load->view('welcome_message');
		}
		
	public function login($message_param = null){
		$this->form_validation->set_rules(
			'email',
			'E-mail',
			'required' | 'valid_email'
		);
		$this->form_validation->set_rules(
			'password',
			'Lösenord',
			'required|min_length[6]'
		);
		$this->form_validation->set_error_delimiters('', '');
		$errors = validation_errors();
		if(!empty($errors)){
			$message = $errors;
		} else {
			$message = $message_param;
		}
		
		if ($message == 'not_logged_in'){
			$message = 'Du måste logga in som admin innan du kan ändra på Bröllopsgruppens sida!';
		}
		
		if ($this->session->userdata('logged_in')) {
			redirect(base_url.admin(), 'refresh');
		}else if ($this->form_validation->run() == FALSE) {
			$this->load->view('user_login', $message);
		}
	}
}
