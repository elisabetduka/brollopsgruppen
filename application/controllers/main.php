<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Admin_model');

	}

	public function index(){
		$this->load->view('main_page');
	}
	
	public function show_page($id){
		$data['page'] = $this->Show_model->get_page_content($id);
		$this->load->view('show_page', $data);
	}
}
