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
	
	public function show_gallery(){
		$data['page'] = $this->Show_model->get_page_content(2);
		$data['show_gallery'] = $this->Show_model->get_gallery('gallery');
		$data['gallery'] = $this->Show_model->get_what_to_show_in_gallery('gallery');
		$this->load->view('show_page', $data);
	}
	
	public function send_contactform(){
		$this->load->library('email');
		$config['mailtype'] = 'html';

		$this->email->initialize($config);
		$this->form_validation->set_rules(
			'title',
			'Ämne',
			'required'
		);
		$this->form_validation->set_rules(
			'content',
			'Meddelande',
			'required'
		);
		$this->form_validation->set_rules(
			'email',
			'Email',
			'required'
		);
		if($this->form_validation->run() == False){
			$this->load->view('show_contactform');
		} else {
		$email = $this->input->post('email');
		$subject = $this->input->post('title');
		$message = $this->input->post('content');
		$phone = $this->input->post('phone');


		$this->email->from($email, 'Your Name');
		$this->email->to('linda.lickander@gmail.com'); 

		$this->email->subject($subject);
		$this->email->message($message . "<br /><br />Mejl: $email Telefon: $phone");	
		
		

		$this->email->send();

		echo $this->email->print_debugger();
			if($this->Main_model->save_contactform($subject, $message, $email, $phone)){
				echo '<div class="content_main">Tack för ditt meddelande, vi hör av oss så snart vi kan</div>';
			}
		}
		
	}
}