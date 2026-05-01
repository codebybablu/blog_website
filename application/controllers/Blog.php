<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

    public function index() {

        $this->db->where('status', 'published');

        $data['blogs'] = $this->db
            ->select('blogs.*, categories.name as category_name')
            ->join('categories', 'categories.id = blogs.category_id', 'left')
            ->order_by('blogs.id', 'DESC')
            ->get('blogs')
            ->result();

        $this->load->view('frontend/blog_list', $data);
    }

    public function detail($slug) {

    $this->db->where('blogs.slug', $slug);
    $this->db->where('blogs.status', 'published');

    $data['blog'] = $this->db
        ->select('blogs.*, categories.name as category_name')
        ->join('categories', 'categories.id = blogs.category_id', 'left')
        ->get('blogs')
        ->row();

    // ❗ if not found
    if(!$data['blog']){
        show_404();
    }

    $this->load->view('frontend/blog_detail', $data);
}
    
}