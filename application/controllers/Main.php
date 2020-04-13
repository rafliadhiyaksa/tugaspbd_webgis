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
	public function maps() {
		

		$data['content'] = $this->load->view('frontend/v_maps',NULL,TRUE);
		$this->load->view('frontend/v_main',$data);
	} 
}
?>