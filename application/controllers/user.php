<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
		{
			$this->load->view('welcome_message');
		}
		
	public function login(){
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
		$data['logged_in']['msg'] = NULL;
		if ($this->session->userdata('logged_in')) {
			redirect(base_url().'admin', 'refresh'); 
		}else if ($this->form_validation->run() == FALSE) {
			$this->load->view('user_login', $data);
		} else {
			$this->load->model('User_model');
			if($this->User_model->login($this->input->post('email'), $this->input->post('password'))){
				redirect(base_url().'admin', 'refresh');
			} else {
				redirect(base_url().'user/login');
			}
		}
	}
	
	public function insert_user(){
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
		if ($this->session->userdata('logged_in')) {
			redirect(base_url().'admin', 'refresh');
		}else if ($this->form_validation->run() == FALSE) {
			$this->load->view('user_insert');
		} else {
			$this->load->model('User_model');
			if($this->User_model->insert_user($this->input->post('email'), $this->input->post('password'))){
				redirect(base_url().'admin', 'refresh');
			}
		}
		
		
	}
	
	public function logout(){
		$this->load->model('User_model');
		$this->User_model->logout();
		if ($this->session->userdata('logged_in')) {
			$data['logged_in']['msg'] = 'logged_in'; 
			if($this->load->view('logout', $data)){
				redirect(base_url().'user/login', 'refresh');
			}
		} else {
			redirect(base_url().'user/login', 'refresh');
		}
		
	}
}
