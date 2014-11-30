<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');
 
class M_login extends CI_Model 
{ 
public function __construct()
 {
 parent::__construct();
}
public function takeUser($email, $password)
{
$this->db->select('*');
$this->db->from('ap_user');
$this->db->where('email', $email);
$this->db->where('password', $password);
//$this->db->where('status', $status);
//$this->db->where('level', $level);
$query = $this->db->get();
return $query->num_rows();
}
public function userData($email)
{
$this->db->select('email');
$this->db->select('panggilan');
$this->db->select('uid');
$this->db->where('$email', $email);
$query = $this->db->get('ap_user');
return $query->row();
}
}