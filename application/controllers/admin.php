<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
</head>

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller {

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
		$this->load->model('Show_model');
	}


	public function index(){
		if ($this->session->userdata('logged_in')) {
			$data['logged_in']['msg'] = 'logged in';
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
				$data['logged_in']['content'] = $this->Show_model->get_footer_content();
				$this->load->view('update_footer', $data);
			} else if($this->Admin_model->update_footer($this->input->post('content'))){
				$this->session->set_flashdata('message', '<div class="content_main">Footern är nu uppdaterad</div>');
				redirect(base_url().'admin', 'refresh');
			}
		} else {
			redirect(base_url().'user/login', 'refresh');
		}
	
	}
	
	public function show_footer(){
		$data['footer'] = $this->Show_model->get_footer_content();
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
				$data['logged_in']['content'] = $this->Show_model->get_page_content($id);
				$this->load->view('update_page', $data);
			} else if($this->Admin_model->update_page($id, $this->input->post('title'), $this->input->post('content'))){ 
				$this->session->set_flashdata('message', '<div class="content_main">Sidan är nu uppdaterad</div>');
				redirect(base_url().'admin', 'refresh');
			}
		} else {
			redirect(base_url().'user/login', 'refresh');
		}
		
	}
	
/*
	public function create_page(){
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
				$this->load->view('create_page', $data);
			} else if($this->Admin_model->create_page($this->input->post('title'), $this->input->post('content'))){
				redirect(base_url().'admin', 'refresh');
			}
		} else {
			redirect(base_url().'user/login', 'refresh');
		}
	}
*/
	
	public function update_header(){
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);
		if($this->session->userdata('logged_in')){
			$data['logged_in']['msg'] = 'logged in';
			if(! $this->upload->do_upload()){
				$data['logged_in']['errors'] = array('error' => $this->upload->display_errors());
				$this->load->view('update_header', $data);
			} else if($this->upload->do_upload()){
				$file_information = $this->upload->data();
				if($this->Admin_model->update_header($file_information['file_name'], $file_information['full_path'], $position = 'header')){
					$this->session->set_flashdata('message', '<div class="content_main">Headern är nu uppdaterad</div>');
					redirect(base_url().'admin', 'refresh');
				}
			}
		} else {
			redirect(base_url().'user/login', 'refresh');
		}
	}
	
	public function update_sidebar($position){
		$data['position'] = $position;
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '300';
		$config['max_width']  = '150';
		$config['max_height']  = '300';

		$this->load->library('upload', $config);
		if($this->session->userdata('logged_in')){
			$data['logged_in']['msg'] = 'logged in';
			if(! $this->upload->do_upload()){
				$data['logged_in']['errors'] = array('error' => $this->upload->display_errors());
				$data['sidebar'] = $this->Show_model->get_sidebar($position);
				$data['show_sidebar'] = $this->Show_model->get_what_to_show_in_sidebar($position);
				$this->load->view('update_sidebar', $data);
			} else if($this->upload->do_upload()){
				$file_information = $this->upload->data();
				if($this->Admin_model->update_sidebar($file_information['file_name'], $file_information['full_path'], $position)){
					$this->session->set_flashdata('message', '<div class="content_main">Sidebaren är nu uppdaterad</div>');
					redirect(base_url().'admin', 'refresh');
				}
			}
		} else {
			redirect(base_url().'user/login', 'refresh');
		}
	}
	
		public function update_gallery(){
		$data['position'] = 'gallery';
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);
		if($this->session->userdata('logged_in')){
			$data['logged_in']['msg'] = 'logged in';
			if(! $this->upload->do_upload()){
				$data['logged_in']['errors'] = array('error' => $this->upload->display_errors());
				$data['show_gallery'] = $this->Show_model->get_gallery('gallery');
				$data['gallery'] = $this->Show_model->get_what_to_show_in_gallery('gallery');
				$data['logged_in']['content'] = $this->Show_model->get_page_content(2);
				$this->load->view('update_page', $data);
			} else if($this->upload->do_upload()){
				$file_information = $this->upload->data();
				if($this->Admin_model->update_gallery($file_information['file_name'], $file_information['full_path'], 'gallery')){
					$this->session->set_flashdata('message', '<div class="content_main">Galleriet är nu uppdaterad</div>');
					redirect(base_url().'admin', 'refresh');
				}
			}
		} else {
			redirect(base_url().'user/login', 'refresh');
		}
	}
	
	public function save_sidebar($position){
		if($this->session->userdata('logged_in')){
			$data['logged_in']['msg'] = 'logged in';
			$images = $this->input->post('image');
			foreach($images as $image){
				$img[] = $image;
			}
			if($this->Admin_model->save_sidebar($img, $position)){
				$this->session->set_flashdata('message', '<div class="content_main">Sidebaren är nu uppdaterad</div>');
				redirect(base_url().'admin', 'refresh');
			}
		} else {
			redirect(base_url().'user/login', 'refresh');
		}
	}
	
	public function save_gallery(){
		if($this->session->userdata('logged_in')){
			$data['logged_in']['msg'] = 'logged in';
			$images = $this->input->post('image');
			foreach($images as $image){
				$img[] = $image;
			}
			if($this->Admin_model->save_gallery($img, 'gallery')){
				$this->session->set_flashdata('message', '<div class="content_main">Galleriet är nu uppdaterad</div>');
				redirect(base_url().'admin', 'refresh');
			}
		} else {
			redirect(base_url().'user/login', 'refresh');
		}
	}
	
	public function create_question(){
		$this->form_validation->set_rules(
			'question',
			'Fråga',
			'required'
		);
		$this->form_validation->set_rules(
			'category',
			'Kategori',
			'required'
		);
		if($this->session->userdata('logged_in')){
			$data['logged_in']['msg'] = 'logged in';
			if($this->form_validation->run() == FALSE){
				$data['questions'] = $this->Show_model->get_questions();
				$this->load->view('create_questions', $data);
			} else if($this->Admin_model->create_question($this->input->post('question'), $this->input->post('category'))){
				$this->session->set_flashdata('message', '<div class="content_main">Frågan är nu sparad</div>');
				redirect(base_url().'admin', 'refresh');
			}
		} else {
			redirect(base_url().'user/login', 'refresh');
		}
	}
	
	public function delete_question($id){
		if($this->session->userdata('logged_in')){
			$data['logged_in']['msg'] = 'logged in';
			if($this->Admin_model->delete_question($id)){
				$this->session->set_flashdata('message', '<div class="content_main">Frågan är nu raderad</div>');
				redirect(base_url().'admin', 'refresh');
			}
		} else {
			redirect(base_url().'user/login', 'refresh');
		}
	}
	
/*
	public function config_contact(){
		$this->form_validation->set_rules(
			'email',
			'Email',
			'required' | 'valid_email'
		);
		if($this->session->userdata('logged_in')){
			$data['logged_in']['msg'] = 'logged in';
			if($this->form_validation->run() == FALSE){
				$this->load->view('config_contact', $data);
			} else if($this->Admin_model->config_contact($this->input->post('email'))){
				redirect(base_url().'admin', 'refresh');
			}
		} else {
			redirect(base_url().'user/login', 'refresh');
		}
	}
*/
	
}
