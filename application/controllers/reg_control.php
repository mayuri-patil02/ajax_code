<?php if
 ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reg_control extends CI_Controller {
 
 public function __construct()
 {
  parent::__construct();
  $this->load->model('reg_model');
  $this->load->library('session');
 }


 function index()
 {  
      $data['country'] = $this->reg_model->fetch_country();
   // $details = $this->users_model->get_user_by_id($this->session->userdata('id'));
   //       $data['username'] = $details[0]->username;
   //       $data['password'] = $details[0]->password;
      $id = $this->session->userdata('id');
      $this->load->view('register', $data);
 
}
 function fetch_state()
 {
  if($this->input->post('country_id'))
  {
   echo $this->reg_model->fetch_state($this->input->post('country_id'));
  }
 }

 function fetch_city()
 {
  if($this->input->post('state_id'))
  {
   echo $this->reg_model->fetch_city($this->input->post('state_id'));
  }
 }

 public function create()
  {
  
    //$id     = $this->input->get('id');
    $fname  = $this->input->post('fname');
    $lname  = $this->input->post('lname');
    $mobile = $this->input->post('mobile');
    // $countryid = $this->input->post('country');
    // $stateid = $this->input->post('state');
    // $cityid = $this->input->post('city');

    
    $data = array(
    
      'fname'  => $fname,
      'lname' => $lname,
      'mobile'=>$mobile
  //     'countryid'=>$countryid,
  //     'stateid'=>$stateid,
  //     'cityid'=>$cityid
   );
    $update=$this->reg_model->createData($data);
    echo $update;
    //echo $update;

  }

  
}


