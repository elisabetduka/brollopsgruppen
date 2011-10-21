<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	/**
	 * Constructor
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model('Show_model');
		$this->load->helper('url');
		if ($this->session->userdata('logged_in')) {
			$data['logged_in']['msg'] = 'logged in';
		} else {
			$data['logged_in']['msg'] = NULL;
		}
 $check_controller = class_exists('Main');
	if($check_controller){
		$data['main'] = 'main page';
	} else{
		$data['main'] = NULL;
	}

		$data['header']['image'] = $this->Show_model->get_header();
		$data['header']['pages'] = $this->Show_model->get_pages();
		$this->load->view('header', $data);
		$data_footer['footer'] = $this->Show_model->get_footer_content();
		$this->load->view('show_footer', $data_footer);
	}

}
