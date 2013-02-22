<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Me_model extends CI_Model {
	function __construct()
	{
		
   }

   public function get_user_homecountry($uid)
   {
      $q = $this
            ->db
            ->where('ID', $uid)
            ->limit(1)
            ->get('users');
     
      if ( $q->num_rows > 0 ) {
         $result = $q->row('hAddr');
         return $result;
      }
      return false;
   }
  
  
}