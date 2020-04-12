<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class gunung extends CI_Controller {
    public function __construct(){
		parent::__construct();
		$this->load->model('GunungModel','Model');
	}
    
	public function index() 
	
	{
         $datacontent['url']='kecamatan';
         $datacontent['title']='Halaman Kecamatan';
		 $datacontent['datatable']=$this->Model->get();
		 $data['content']=$this->load->view('backend/gunung/GunungView',$datacontent,TRUE);
		 $data['title']='Welcome  Guys';
		 $this->load->view('backend/gunung/GunungView',$data);
	}
    
}