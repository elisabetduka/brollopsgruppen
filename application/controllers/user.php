<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
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
		/*  $this->form_validation->set_error_delimiters('', ''); 
		 $errors = validation_errors();
		if(!empty($errors)){
			$message = $errors;
		} else {
			$message = $message_param;
		}
		
		if ($message == 'not_logged_in'){
			$message = 'Du måste logga in som admin innan du kan ändra på Bröllopsgruppens sida!';
		} */ 
		$data['logged_in'] = NULL;
		if ($this->session->userdata('logged_in')) {
			redirect(base_url().'user/insert_user', 'refresh'); 
		}else if ($this->form_validation->run() == FALSE) {
			$this->load->view('user_login', /*$message */$data);
		} else {
			$this->load->model('User_model');
			if($this->User_model->login($this->input->post('email'), $this->input->post('password'))){
				redirect(base_url().'user/insert_user', 'refresh');
			} else {
				redirect(base_url().'user/login');
			}
		}
	}
	
	public function insert_user($message_param = NULL){
		$this->form_validation->set_rules(
			'email',
			'E-mail',
			'required|valid_email'
		);
		$this->form_validation->set_rules(
			'password',
			'Password',
			'required|min_length[6]|matches[password-repeat]'
		);
		$this->form_validation->set_rules(
			'password-repeat',
			'Repeat password',
			'required|min_length[6]'
		);
		$this->form_validation->set_error_delimiters('', '');
		$errors = validation_errors();
		if(!empty($errors)){
			$message = $errors;
		} else {
			$message = $message_param;
		}
		if($message = 'email_exists'){
			$message = 'Email already exists';
		}
		if ($this->session->userdata('logged_in')) {
			redirect(base_url().'admin', 'refresh');
		}else if ($this->form_validation->run() == FALSE) {
			$this->load->view('user_insert');
		} else {
			$this->load->model('User_model');
			$this->User_model->insert_user($this->input->post('email'), $this->input->post('password'));
		}
		
		
	}
	
	public function logout(){
		$this->load->model('User_model');
		$this->User_model->logout();
		if ($this->session->userdata('logged_in')) {
			$data['logged_in'] = 'logged_in'; 
			$this->load->view('logout', $data);
		} else {
			redirect(base_url().'user/login', 'refresh');
		}
		
	}
}
