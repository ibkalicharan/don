<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
   	{
      	parent::__construct();
         
   
   	}

	public function index()
	{
      if (($this->session->userdata('logged_in') != TRUE)) {
            redirect('admin');
      }

      $this->load->model('homepage_model');
      
      $res = $this
                ->homepage_model
                ->get_user_details($this->session->userdata('uid'));
      
      $this->load->view('homepage', $res);
	}
}