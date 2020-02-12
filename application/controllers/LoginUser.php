<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginUser extends CI_Controller {
public function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model');
	}

	public function index()
	{
		$this->load->view('login_page');
	}

	public function create()
	{
		$user_name 	=	$this->input->post('username');
		$password 	=	$this->input->post('password');
		
		$data = array(
			'username'	=> $user_name,
			'password' => $password
			
		);

		
		$insert = $this->LoginUsers_model->createData($data);
		echo $insert;
		
	}
	
}

?>