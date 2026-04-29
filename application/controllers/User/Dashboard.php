<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct() {
        parent::__construct();
//         echo APPPATH;
// die();
//         echo file_exists(APPPATH.'core/MY_Controller.php') ? 'FOUND' : 'NOT FOUND';
// die();
        $this->checkLogin();   // login required
        $this->checkUser();    // only user allowed

    }

    public function index() {
        $this->load->view('user/dashboard');
    }
}