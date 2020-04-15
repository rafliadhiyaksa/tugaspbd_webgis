<?php

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(empty($this->session->userdata('id'))){
			redirect('login/admin');
		} 
		$this->load->model('m_admin');
		$this->load->model('m_akun');

	}
	public function index()
	{
		// Menu
		$datacontent['dashboard']='Dashboard';
		$datacontent['accountdata']='Data Account';
		$datacontent['mountdata']='Mountain Maps';
		$datacontent['tabelgunung']='Data Maps';
		// content
		$data['content'] = $this->load->view('backend/content/beranda',$datacontent,TRUE);
		$this->load->view('backend/index',$data);

	}
	

	public function data_akun() {
		if($this->session->userdata('role') == 'admin'){
			$datacontent['accountdata']='ACCOUNT DATA';
			$datacontent['akun'] = $this->m_akun->get()->result();
			
			$data['content'] = $this->load->view('backend/content/v_userlist',$datacontent,TRUE);
			$this->load->view('backend/content/v_akun',$data);
		} else {
			redirect('admin');
		}
	}




	public function add()
	{
	  // Jika form di submit jalankan blok kode ini
	  if ($this->input->post('submit')) {
		
		$this->form_validation->set_rules('nama', 'Nama', 'required');

		// Mengatur validasi data username,
		// # required = tidak boleh kosong
		// # min_length[5] = username harus terdiri dari minimal 5 karakter
		// # is_unique[users.username] = username harus bernilai unique, 
		//   tidak boleh sama dengan record yg sudah ada pada tabel users
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[akun.username]');
  
		// Mengatur validasi data password,
		// # required = tidak boleh kosong
		// # min_length[5] = password harus terdiri dari minimal 5 karakter
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
  
		// Mengatur validasi data level,
		// # required = tidak boleh kosong
		// # in_list[administrator, alumni] = hanya boleh bernilai 
		//   salah satu di antara administrator atau alumni
		$this->form_validation->set_rules('role', 'Role', 'required|in_list[admin,operator,user]');
  

  
		// Mengatur pesan error validasi data
		$this->form_validation->set_message('required', '%s tidak boleh kosong!');
		$this->form_validation->set_message('min_length', '%s minimal %d karakter!');
  
		// Jalankan validasi jika semuanya benar maka lanjutkan
		if ($this->form_validation->run() === TRUE) {
  
		  $data = array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'role' => $this->input->post('role'),
		  );
  
		  // Jalankan function insert pada model_users
		  $query = $this->m_akun->insert($data);
  
		  // cek jika query berhasil
		  if ($query) $message = array('status' => true, 'message' => 'Berhasil menambahkan user');
		  else $message = array('status' => true, 'message' => 'Gagal menambahkan user');
  
		  // simpan message sebagai session
		  $this->session->set_flashdata('message', $message);
  
		  // refresh page
		  redirect('admin/add', 'refresh');
		} 
	  }
	  
	  // Data untuk page users/add
	  $data['pageTitle'] = 'Tambah Data User';
	  $data['content'] = $this->load->view('backend/content/userAdd', $data, TRUE);
  
	  // Jalankan view template/layout
	  $this->load->view('backend/content/v_akun', $data);
	}

	public function edit($id = null)
  {
    // Jika form di submit jalankan blok kode ini
    if ($this->input->post('submit')) {
	  
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[akun.username]');

      // Mengatur validasi data password,
      // # required = tidak boleh kosong
      // # min_length[5] = password harus terdiri dari minimal 5 karakter
      $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

      // Mengatur validasi data level,
      // # required = tidak boleh kosong
      // # in_list[administrator, alumni] = hanya boleh bernilai 
      //   salah satu di antara administrator atau alumni
      $this->form_validation->set_rules('role', 'Role', 'required|in_list[admin,operator,user]');

      // Mengatur pesan error validasi data
      $this->form_validation->set_message('required', '%s tidak boleh kosong!');
      $this->form_validation->set_message('min_length', '%s minimal %d karakter!');

      // Jalankan validasi jika semuanya benar maka lanjutkan
      if ($this->form_validation->run() === TRUE) {

        $data = array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        );

        // Jalankan function insert pada model_users
        $query = $this->m_akun->update($id, $data);

        // cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => 'Berhasil memperbarui user');
        else $message = array('status' => true, 'message' => 'Gagal memperbarui user');

        // simpan message sebagai session
        $this->session->set_flashdata('message', $message);

        // refresh page
        redirect('admin/edit/'.$id, 'refresh');
      } 
    }
    
    // Ambil data user dari database
    $user = $this->m_akun->get_where(array('id' => $id))->row();

    // Jika data user tidak ada maka show 404
    if (!$user) show_404();

    // Data untuk page users/add
    $data['pageTitle'] = 'Edit Data User';
    $data['user'] = $user;
    $data['content'] = $this->load->view('backend/content/userEdit', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('backend/content/v_akun', $data);
  }

  public function delete($id)
  {
    // Ambil data user dari database
    $user = $this->m_akun->get_where(array('id' => $id))->row();

    // Jika data user tidak ada maka show 404
    if (!$user) show_404();

    // Jalankan function delete pada model_users
    $query = $this->m_akun->delete($id);

    // cek jika query berhasil
    if ($query) $message = array('status' => true, 'message' => 'Berhasil menghapus user');
    else $message = array('status' => true, 'message' => 'Gagal menghapus user');

    // simpan message sebagai session
    $this->session->set_flashdata('message', $message);

    // refresh page
    redirect('admin/data_akun', 'refresh');
  }

  
}