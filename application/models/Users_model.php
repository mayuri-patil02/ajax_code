<?php 

class Users_model extends CI_Model
{
	
        public function createData($data)
        {
                
                $username       =       $data['username'];
                $password       =       $data['password'];
                $arraUser       =       array(
                                                "id"       =>$id,
                                                "user_name"=>$username,
                                                "password"=>$password
                                                );
                
        $this->db->insert('profile',$arraUser); 

        $id        =       $this->db->insert_id();

        $id = $this->session->userdata('id');
        $query = $this->db
        ->select('id')
        ->from('profile')
        ->where('id', $id)
        ->get();

        return $query->result();

        //return $id;
        //print_r($this->session->userdata('id'));exit;
        //print_r($this->session->userdata('id'));
                


	}
}