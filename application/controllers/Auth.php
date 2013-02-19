<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

   public function __construct()
   {
      parent::__construct();
   }

	public function index()
   {
    //if user is logged in already, prevent them from logging in again and redirect to main page
	     if ($this->session->userdata('logged_in') === TRUE) { redirect('main'); }
    //End checking

  	//Form validation code
    $this->load->library('form_validation');
	  $this->form_validation->set_rules('email_address', 'Email Address', 'valid_email|required');
	  $this->form_validation->set_rules('password', 'Password', 'min_length[4]|required');

		//run form validation by testing the fields against set rules
	  if ( $this->form_validation->run() !== false ) {
			//validation has passed
			//load admin_model to check for users from DB 
		  $this->load->model('auth_model');
			//pass email_address and password to the verify_user function of admin_model to check for user in db
			//store result of db query in variable $result
			//if a user is found then $result !== false
		  $result = $this
                  ->admin_model
                  ->verify_user(
                     $this->input->post('email_address'), 
                     $this->input->post('password')
                  );

			//if a user is found 
         if ( $result !== false ) {
            //start a session storing the username which is the email_address entered
			$this->session->set_userdata('username', $result->email_address);
			$this->session->set_userdata('admin', $result->admin);
				//if db shows user has two-factor authentication enabled
			if ( $result->two_factor_permission ) {
				//run _secound_auth function, passing in email address
			  $this->_second_auth($result->email_address);
              return;
            }
				//user's account is not enabled for two-factor authentication
			else {
				//set session to show that user is logged in, will now be able to access site 
			  $this->session->set_userdata('logged_in', TRUE);
				//redirect to main controller (home page)
			  redirect('main'); 
            }
         } 
      }
      //load login_view view where user enters email address and password
      $this->load->view('login_view');
   }
   
  //function for starting two-factor authentication process
  public function _second_auth($username) {
	// Load Duo Security library for two-factor security
    $this->load->library('duo');
    
    // Duo Integration Key (set by Duo)
    $ikey = "DIXKJ531AMF6PTVXEEIB";
    
    // Duo Secret Key (set by Duo)
    $skey = "gdhUyo4Pwd7LArZ849dgSYOqBVaf09ocjl43L3bq";
    
    // Personal Application Key (set by Website)
    $akey = "fksuhcbs9034gfrewof'SOKNJCPIuduhca[9a[p9*&";
    
	  // Duo Security related
    $data['host'] = "api-44bfe537.duosecurity.com";
    $data['post_action'] = base_URL() . "/admin/process_second_auth";
    $data['sig_request'] = $this->duo->signRequest($ikey, $skey, $akey, $username);
    
    $this->load->view('second_auth', $data);
  }

   
  public function process_second_auth()
  {
        
    $this->load->library('duo');
    
    // Same keys used in _second_auth()
    $ikey = "DIXKJ531AMF6PTVXEEIB";
    $skey = "gdhUyo4Pwd7LArZ849dgSYOqBVaf09ocjl43L3bq";
    $akey = "fksuhcbs9034gfrewof'SOKNJCPIuduhca[9a[p9*&";
    
    $sig_response = $this->input->post('sig_response');
    $username = $this->duo->verifyResponse($ikey, $skey, $akey, $sig_response);
    
    if ( $username ) {
      $this->session->set_userdata('logged_in', TRUE);
      redirect('main');
    }
    else{
      redirect('auth');
    }
  }
      
  public function logout()
   {
      $this->session->sess_destroy();
      redirect('auth');
   }
   
}