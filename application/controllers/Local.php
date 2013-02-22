<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Local extends CI_Controller {

	public function __construct()
   	{
      	parent::__construct();
        
   
   	}

   	public function index() {
   		$this->load->view('local_view');
   	}

   	public function aliss() {
   		$this->load->view('aliss_view');
   	}

}