<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct() {
        parent::__construct();
//         echo APPPATH;
// die();
//         echo file_exists(APPPATH.'core/MY_Controller.php') ? 'FOUND' : 'NOT FOUND';
// die();
        $this->checkLogin(); // login required
        $this->checkAdmin(); // only admin allowed
    }

    public function index() {

    $data['recent_blogs'] = $this->db
    ->select('blogs.*, categories.name as category_name')
    ->join('categories', 'categories.id = blogs.category_id', 'left')
    ->order_by('blogs.id', 'DESC')
    ->limit(5)
    ->get('blogs')
    ->result();


    $data['total_blogs'] = $this->db->count_all('blogs');

    $data['published_blogs'] = $this->db
        ->where('status', 'published')
        ->count_all_results('blogs');

    $data['draft_blogs'] = $this->db
        ->where('status', 'draft')
        ->count_all_results('blogs');

    $data['total_categories'] = $this->db->count_all('categories');
        $this->load->view('admin/dashboard', $data);
    }
}