<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class maps extends CI_Controller {
    public function __construct(){
		parent::__construct();
        $this->load->model('MapsModel','Model');
        if(empty($this->session->userdata('id'))){
			redirect('login/admin');
		}
		$this->load->model('m_admin');
		$this->load->model('m_akun');

	}
    
	public function index() 
	
	{
         $datacontent['url']='maps';
         $datacontent['title1']='Maps View';
		//  $datacontent['datatable']=$this->Model->get();
         $data['content']=$this->load->view('backend/leaflet/mapView',$datacontent,TRUE);
		 $data['title']='Map View';
		 $this->load->view('backend/leaflet/mapView',$data);
	}
	
	public function gunung_json()
 {
   $data=$this->db->get('m_gunung')->result();
   echo json_encode($data);
 }
}