<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Admin_model');
		$this->load->model('Show_model');
		$this->load->model('Main_model');

	}

	public function index(){
		$this->load->view('main_page');
	}
	
	public function show_page($id){
		$data['page'] = $this->Show_model->get_page_content($id);
		$this->load->view('show_page', $data);
	}
	
	public function show_contactform(){
		$this->load->view('show_contactform');
	}
	
	public function show_questions(){
		$data['question'] = $this->Show_model->get_questions();
		$this->load->view('show_questions', $data);
	}
	
	public function save_question_answers(){
		$this->form_validation->set_rules(
			'content',
			'Innehåll',
			'required'
		);
		if($this->session->userdata('logged_in')){
			$data['logged_in']['msg'] = 'logged in';
			$question_id = $this->input->post('question');
			foreach($question_id as $q_id){
				$id[] = $q_id;
			}
			if($this->Main_model->save_question_answers($id, $this->input->post('name'), $this->input->post('email'), $this->input->post('phone'))){
				redirect(base_url(), 'refresh');
			}
		}
	}
}
