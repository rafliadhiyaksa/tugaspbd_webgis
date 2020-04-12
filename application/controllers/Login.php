<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('frontend/account/v_login');
	}

	public function cek_login()
    {
        //load model M_user
        $this->load->model('M_user');

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        //cek login via model
        $cek = $this->M_user->cek_login($username, $password);
        
        if(!empty($cek)){

            foreach($cek as $user) {

                //looping data user
                $session_data = array(
                    'id'   => $user->id,
                    'username'  => $user->username,
                    'nama' => $user->nama,
                    'role' => $user->role,
                );
                //buat session berdasarkan user yang login
                $this->session->set_userdata($session_data);

            }

            echo "success";

        } else {
            
            echo "error";

        }

    }

    //UNTUK ADMIN

    public function admin() {
        $this->load->view('backend/account/v_login');
    }

    public function cek_login_admin()
    {
        //load model M_user
        $this->load->model('m_admin');

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        //cek login via model
        $cek = $this->m_admin->cek_login_admin($username, $password);
        
        if(!empty($cek)){

            foreach($cek as $admin) {

                //looping data user
                $session_data = array(
                    'id'   => $admin->id,
                    'username'  => $admin->username,
                    'nama' => $admin->nama,
                    'role' => $admin->role
                );
                //buat session berdasarkan user yang login
                $this->session->set_userdata($session_data);

            }

            echo "success";

        } else {
            
            echo "error";

        }

    }

    
}
