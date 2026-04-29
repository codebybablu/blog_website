<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    // ✅ Login check
    protected function checkLogin() {
        if(!$this->session->userdata('logged_in')) {
            redirect('admin/login');
        }
    }

    // ✅ Admin only
    protected function checkAdmin() {
        if($this->session->userdata('role') != 'admin') {
            redirect('user/dashboard');
        }
    }

    // ✅ User only
    protected function checkUser() {
        if($this->session->userdata('role') != 'user') {
            redirect('admin/dashboard');
        }
    }
}