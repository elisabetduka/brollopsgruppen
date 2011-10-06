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
	}


	public function index(){
		if ($this->session->userdata('logged_in')) {
			$data['logged_in'] = 'logged in';
			$this->load->view('dashboard', $data);
		} else {
			redirect(base_url().'user/login', 'refresh');
		}
		
	}
}
