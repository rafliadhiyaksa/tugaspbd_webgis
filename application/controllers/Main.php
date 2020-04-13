<?php

class Main extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(empty($this->session->userdata('id'))){
			redirect('login');
		}
		$this->load->model('GunungModel','model');
	}

	public function index()
	{
		$data['content'] = $this->load->view('frontend/v_maps',NULL,TRUE);
		$this->load->view('frontend/v_main',$data);

	} 
	public function gunung_json()
 {
   $data=$this->db->get('m_gunung')->result();
   echo json_encode($data);
 }
}
?>