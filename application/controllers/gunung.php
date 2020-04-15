<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class gunung extends CI_Controller {
    public function __construct(){
		parent::__construct();
		$this->load->model('GunungModel','Model');
		if(empty($this->session->userdata('id'))){
			redirect('login/admin');
		}
		$this->load->model('m_admin');
		$this->load->model('m_akun');

	}
    
	public function index() 
	
	{
         $datacontent['url']='gunung';
         $datacontent['title1']='MAPS DATA';
		 $datacontent['datatable']=$this->Model->get();
		 $data['content']=$this->load->view('backend/gunung/DataGunung',$datacontent,TRUE);
		 $data['title']='Tabel Daftar Gunung';
		 $this->load->view('backend/gunung/GunungView',$data);
	}
	public function form($parameter='',$id='')
	{
		$datacontent['url']='gunung';
		$datacontent['parameter']=$parameter;
		$datacontent['id']=$id;
		$datacontent['title']='FORM DATA GUNUNG';
		$data['content']=$this->load->view('backend/gunung/formView',$datacontent,TRUE);
		$data['title']=$datacontent['title'];
		$this->load->view('backend/gunung/formView',$data);
	}

	public function simpan()
	{
		if($this->input->post()){
			$data=[
				'kd_gunung'=>$this->input->post('kd_gunung'),
				'nm_gunung'=>$this->input->post('nm_gunung'),
				'lokasi'=>$this->input->post('lokasi'),
				'keterangan'=>$this->input->post('keterangan'),
				'lat'=>$this->input->post('lat'),
				'lng'=>$this->input->post('lng'),
				
				// 'warna_gunung'=>$this->input->post('warna_gunung'),
			];
			// upload
			if($_FILES['geojson_gunung']['name']!=''){
				$upload=upload('geojson_gunung','geojson','geojson');
				if($upload['info']==true){
					$data['geojson_gunung']=$upload['upload_data']['file_name'];
				}
				elseif($upload['info']==false){
					$info='<div class="alert alert-danger alert-dismissible">
	            		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            		<h4><i class="icon fa fa-ban"></i> Error!</h4> '.$upload['message'].' </div>';
					$this->session->set_flashdata('info',$info);
					redirect('gunung');
					exit();
				}
			}
			if($_FILES['status']['name']!=''){
				$upload=upload('status','status','image');
				if($upload['info']==true){
					$data['status']=$upload['upload_data']['file_name'];
				}
				elseif($upload['info']==false){
					$info='<div class="alert alert-danger alert-dismissible">
	            		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            		<h4><i class="icon fa fa-ban"></i> Error!</h4> '.$upload['message'].' </div>';
					$this->session->set_flashdata('info',$info);
					redirect('gunung');
					exit();
				}
			}

			// upload
			
			if($_POST['parameter']=="tambah"){
				$this->Model->insert($data);
			}
			else{
				$this->Model->update($data,['id_gunung'=>$this->input->post('id_gunung')]);
			}

		}

		redirect('gunung');
	}

	public function hapus($id=''){
		// hapus file di dalam folder
		$this->db->where('id_gunung',$id);
		$get=$this->Model->get()->row();
		$geojson_gunung=$get->geojson_gunung;
		unlink('assets/unggah/geojson/'.$geojson_gunung);
		// end hapus file di dalam folder
		$this->Model->delete(["id_gunung"=>$id]);
		redirect('gunung');
	}

	public function pdf() {
		$this->load->library('dompdf_gen');

		$data['gunung'] = $this->Model->get('m_gunung')->result();
		$this->load->view('backend/gunung/datagunung_pdf', $data);

		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("data_gunung.pdf", array('Attachment' => 0));

	}
    
}