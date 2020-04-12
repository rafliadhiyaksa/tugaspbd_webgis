<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_model {


    function cek_login_admin($username, $password)
    {
    $this->db->select("*");
    $this->db->from("akun");
    $this->db->where("username", $username);
    $where = '(role ="admin" or role="operator")';
    $this->db->where($where);
    $query = $this->db->get();
    $user = $query->row();

    /**
     * Check password
     */
    if (!empty($user)) {

        if (password_verify($password, $user->password)) {

            return $query->result();

        } else {

            return FALSE;

        }

        } else {

        return FALSE;

        }
    }
}