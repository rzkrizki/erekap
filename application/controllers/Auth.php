<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	//constructor
	public function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Auth_model');
        $this->load->helper('captcha');
    }
    //Login
	function index(){
		$this->Auth_model->is_login();
		$this->load->view('login');
		// $this->load->view('under_construction');
	}

	function login(){
		$data = $this->Auth_model->login($this->input->post());
		// var_dump($data);
		
		echo json_encode($data);
		// var_dump($this->input->post());
	}

	function logout(){
		$this->Auth_model->logout();
	}

	function error_404(){
		$this->load->view('404_error');
	}


}
