<?php
 
class Membership_model extends CI_Model {
 
 function validate()
 {
  $this->db->where('email', $this->input->post('email'));
  $this->db->where('password', md5($this->input->post('password')));
  $query = $this->db->get('ap_user');   
  if($query->num_rows == 1)
  {
   return true;
  }
   
 }
  
 function create_member()
 {
   
  $new_member_insert_data = array(
   'nama_depan' => $this->input->post('first_name'),
   'nama_belakang' => $this->input->post('last_name'),
   'email_address' => $this->input->post('email_address'),   
   'username' => $this->input->post('username'),
   'password' => md5($this->input->post('password'))      
  );
   
  $insert = $this->db->insert('ap_user', $new_member_insert_data);
  return $insert;
 }
}