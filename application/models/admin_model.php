<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {
	function __construct()
	{
		
   }

   public function verify_user($email, $password)
   {
      $q = $this
            ->db
            ->where('username', $email)
            ->limit(1)
            ->get('auth');
     
      if ( $q->num_rows > 0 ) {
         $result = $q->row();
         $this->load->library('password');
         
         //Make sure the hashes match.
         if($this->password->check_password($password, $result->passHash)){
          return $result;
         }  
      }
      return false;
   }
  
  
}

