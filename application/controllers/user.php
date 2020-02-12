<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Users_model');
	
	}

	public function index()
	{
		$this->load->view('login');
		$id = $this->session->userdata('id');
	}

	public function create()
	{

		$user_name 	=	$this->input->post('username');
		$password 	=	$this->input->post('password');
		
		$data = array(
	
			'username'	=> $user_name,
			'password' => $password
			
		);

		
		$insert = $this->Users_model->createData($data);
		echo $insert;
		if($insert)
		{
		$this->session->set_userdata('id', $insert);

		// $this->session->set_userdata($data);
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";

		}
	
 }
}
