<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
</head>

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	 function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Admin_model');
	}


	public function index(){
		if ($this->session->userdata('logged_in')) {
			$data['logged_in']['msg'] = 'logged in';
			$data['logged_in']['pages'] = $this->Admin_model->get_pages();
			$this->load->view('dashboard', $data);
		} else {
			redirect(base_url().'user/login', 'refresh');
		}
		
	}
	
	public function update_footer(){
		$this->form_validation->set_rules(
			'content',
			'Innehåll',
			'required'
		);
		if ($this->session->userdata('logged_in')) {
			$data['logged_in']['msg'] = 'logged in';
			if($this->form_validation->run() == FALSE){
				$data['logged_in']['content'] = $this->Admin_model->get_footer_content();
				$this->load->view('update_footer', $data);
			} else if($this->Admin_model->update_footer($this->input->post('content'))){
				redirect(base_url().'admin', 'refresh');
			}
		} else {
			redirect(base_url().'user/login', 'refresh');
		}
	
	}
	
	public function show_footer(){
		$this->load->model('Admin_model');
		$data['footer'] = $this->Admin_model->get_footer_content();
		$this->load->view('show_footer', $data);
		
	}
	
	public function update_page($id){
		$this->form_validation->set_rules(
			'title',
			'Rubrik',
			'required'
		);
		$this->form_validation->set_rules(
			'content',
			'Innehåll',
			'required'
		);
		if($this->session->userdata('logged_in')){
			$data['logged_in']['msg'] = 'logged in';
			if($this->form_validation->run() == FALSE){
				$data['logged_in']['content'] = $this->Admin_model->get_page_content($id);
				$this->load->view('update_page', $data);
			} else if($this->Admin_model->update_page($id, $this->input->post('title'), $this->input->post('content'))){
				redirect(base_url().'admin', 'refresh');
			}
		} else {
			redirect(base_url().'user/login', 'refresh');
		}
		
	}
	
	
}
