<?php
class Reg_model extends CI_Model
{

 function fetch_country()
    {
  $this->db->order_by("country_name", "ASC");
  $query = $this->db->get("countries");
  return $query->result();
    }

 function fetch_state($country_id)
  {
  $this->db->where('country_id', $country_id);
  $this->db->order_by('state_name', 'ASC');
  $query = $this->db->get('states');
  $output = '<option value="">Select State</option>';
  foreach($query->result() as $row)
      {
   $output .= '<option value="'.$row->state_id.'">'.$row->state_name.'</option>';
      }
  return $output;
 }

 function fetch_city($state_id)
 {
  $this->db->where('state_id', $state_id);
  $this->db->order_by('city_name', 'ASC');
  $query = $this->db->get('cities');
  $output = '<option value="">Select City</option>';
  foreach($query->result() as $row)
    {
   $output .= '<option value="'.$row->city_id.'">'.$row->city_name.'</option>';
    }
  return $output;
 }
 public function createData($data)
        {
                $fname       =       $data['fname'];
                $lname       =       $data['lname'];
                $mobile      =       $data['mobile'];
               // $countryid   =       $data['countryid'];
                //$stateid     =       $data['stateid'];
                //$cityid      =       $data['cityid'];

                $arraUser       =       array(
                                                "fname"=>$fname,
                                                "lname"=>$lname,
                                                "mobile"=>$mobile
                                                // "countryid"=>$countryid,
                                                // "stateid"=>$stateid,
                                                // "cityid"=>$cityid
                                                 );
              //$this->db->where('id', $uid);
              $this->db->update('profile', $arraUser);
              $id=$this->db->update_id();
              return $id;
              
             //  $this->db->where('id', $_POST['id']);
            
}
}
 