<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

   public function __construct()
   {
      session_start();
      parent::__construct();
   }

	public function index() 
  {
   if ($this->session->userdata('logged_in') === TRUE) { redirect('home'); }

      $this->load->library('form_validation');
      $this->form_validation->set_rules('username', 'Username', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');

      if ( $this->form_validation->run() !== false ) {
         // then validation passed. Get from db
         $this->load->model('admin_model');
         $res = $this
                  ->admin_model
                  ->verify_user(
                     $this->input->post('username'), 
                     $this->input->post('password')
                  );

         if ( $res !== false ) {
            
            $this->session->set_userdata('username', $res->username);
            $this->session->set_userdata('uid', $res->userID);

            if ( $res->two_factor_permission ){
              $this->_second_auth($res->username);
              return;
            }
            
            else{
              $this->session->set_userdata('logged_in', TRUE);
              redirect('home'); 
            }
         
         }
      
      }
      
      $this->load->view('login_view');
   }
   
   
  public function _second_auth($username)
  {
    $this->config->load('ilw');

    $this->load->library('duo');
    
    // Duo Integration Key
    $ikey = $this->config->item('ikey');
    
    // Duo Secret Key
    $skey = $this->config->item('skey');
    
    // Personal Application Key
    $akey = $this->config->item('akey');
    
    $data['host'] = $this->config->item('duourl');
    $data['post_action'] = base_URL() . "index.php/admin/process_second_auth";
    $data['sig_request'] = $this->duo->signRequest($ikey, $skey, $akey, $username);
    
    $this->load->view('second_auth', $data);
  }

   
  public function process_second_auth()
  {
    if ( $this->session->userdata('logged_in') == TRUE ) {
      redirect('home');
    }

    $this->config->load('ilw');
    
    $this->load->library('duo');
    
    // Same keys used in _second_auth()
    $ikey = $this->config->item('ikey');
    $skey = $this->config->item('skey');
    $akey = $this->config->item('akey');
    
    $sig_response = $this->input->post('sig_response');
    $username = $this->duo->verifyResponse($ikey, $skey, $akey, $sig_response);
    
    if ( $username ) {
      $this->session->set_userdata('logged_in', TRUE);
      redirect('home');
    }
    else{
      redirect('admin');
    }
  }

   public function logout()
   {
      $this->session->sess_destroy();
      redirect('admin');
   }
   
   function hash($pass)
   {
      $this->load->library('password');
      echo $this->password->hash($pass);
   }

}

