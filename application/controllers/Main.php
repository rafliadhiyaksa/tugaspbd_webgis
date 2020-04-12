<?php

class Main extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(empty($this->session->userdata('id'))){
			redirect('login');
		}

	}
	public function index()
	{
		$this->load->view('frontend/v_main');

    }
}
?>