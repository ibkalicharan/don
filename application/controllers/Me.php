<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Me extends CI_Controller {

	public function __construct()
   	{
      	parent::__construct();
   	}

	public function index() {
		$this->load->view('me_view');
	}

	public function getmehome($homecountry, $departure) {
		$cmd = 'python /var/www/ilw/backend/get-me-home/get-me-home.py '.$homecountry.' '.$departure;
		$result = exec($cmd, $out);
		var_dump($out);

		var_dump($result);
	}

	public function homecountry() {
		$this->load->model('me_model');

		$res = $this->me_model->get_user_homecountry($this->session->userdata('uid'));

		$hAddr = explode(',',$res);
		
		echo($hAddr[3]);
	}

	public function hometown() {
		$this->load->model('me_model');

		$res = $this->me_model->get_user_homecountry($this->session->userdata('uid'));

		$hAddr = explode(',',$res);
		
		echo($hAddr[1]);
	}

}