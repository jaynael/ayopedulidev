<?php
Class User extends CI_Model
{
 function login($email, $password)
 {
   $this -> db -> select('uid, email, password');
   $this -> db -> from('ap_user');
   $this -> db -> where('email', $email);
   //$this -> db -> where('password', MD5($password));
   $this -> db -> where('password', $password);
   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
}
?>
