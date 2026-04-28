<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // 🔒 login check
        if(!$this->session->userdata('logged_in')){
            redirect('admin/login');
        }

        // 🔒 role check
        if($this->session->userdata('role') != 'user'){
            redirect('admin/dashboard');
        }
    }

    public function index() {
        $this->load->view('user/dashboard');
    }
}