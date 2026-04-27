<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function login() {
        // echo "Controller Working";
        // die();
        $this->load->view('admin/login');
    }

    public function loginSubmit() {
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));

        $user = $this->db->get_where('users', [
            'email' => $email,
            'password' => $password,
            'role' => 'admin'
        ])->row();

        if($user){
            $this->session->set_userdata('admin_id', $user->id);
            redirect('admin/dashboard');
        } else {
            echo "Invalid Login";
        }
    }

    public function logout(){
        $this->session->unset_userdata('admin_id');
        redirect('admin/login');
    }
}