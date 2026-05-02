<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

public function index() {

    $category_id = $this->input->get('category');
    $search = $this->input->get('search');

    // 🔹 categories
    $data['categories'] = $this->db->get('categories')->result();

    // 🔹 base condition
    $this->db->where('blogs.status', 'published');

    // 🔹 category filter
    if($category_id){
        $this->db->where('blogs.category_id', $category_id);
    }

    // 🔹 search filter
    if($search){
        $this->db->group_start();
        $this->db->like('blogs.title', $search);
        $this->db->or_like('blogs.content', $search);
        $this->db->group_end();
    }

    $data['blogs'] = $this->db
        ->select('blogs.*, categories.name as category_name')
        ->join('categories', 'categories.id = blogs.category_id', 'left')
        ->order_by('blogs.id', 'DESC')
        ->get('blogs')
        ->result();

    $this->load->view('frontend/blog_list', $data);
}


    //latest code

    // public function index() {

    // $category_id = $this->input->get('category');

    // // 🔹 get categories
    // $data['categories'] = $this->db->get('categories')->result();

    // // 🔹 filter blogs
    // $this->db->where('blogs.status', 'published');

    // if($category_id){
    //     $this->db->where('blogs.category_id', $category_id);
    // }

    // $data['blogs'] = $this->db
    //     ->select('blogs.*, categories.name as category_name')
    //     ->join('categories', 'categories.id = blogs.category_id', 'left')
    //     ->order_by('blogs.id', 'DESC')
    //     ->get('blogs')
    //     ->result();

    // $this->load->view('frontend/blog_list', $data);
// }

    // public function index() {

    //     $this->db->where('status', 'published');

    //     $data['blogs'] = $this->db
    //         ->select('blogs.*, categories.name as category_name')
    //         ->join('categories', 'categories.id = blogs.category_id', 'left')
    //         ->order_by('blogs.id', 'DESC')
    //         ->get('blogs')
    //         ->result();

    //     $this->load->view('frontend/blog_list', $data);
    // }

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