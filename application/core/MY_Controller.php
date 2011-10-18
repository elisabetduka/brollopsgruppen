<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	/**
	 * Constructor
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->helper('url');
		if ($this->session->userdata('logged_in')) {
			$data['logged_in']['msg'] = 'logged in';
		} else {
			$data['logged_in']['msg'] = NULL;
		}
		$data['header']['image'] = $this->Admin_model->get_header();
		$data['header']['pages'] = $this->Admin_model->get_pages();
		$this->load->view('header_admin', $data);
	}

}