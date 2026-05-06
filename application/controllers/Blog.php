<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

public function index() {

    $this->load->library('pagination');

    $category_id = $this->input->get('category');
    $search = $this->input->get('search');

    // 🔹 categories
    $data['categories'] = $this->db->get('categories')->result();

    // 🔹 COUNT QUERY
    $this->db->from('blogs');
    $this->db->where('status', 'published');

    if($category_id){
        $this->db->where('category_id', $category_id);
    }

    if($search){
        $this->db->group_start();
        $this->db->like('title', $search);
        $this->db->or_like('content', $search);
        $this->db->group_end();
    }

    $total_rows = $this->db->count_all_results();

    // 🔹 PAGINATION CONFIG (🔥 ENABLED)
    $config['base_url'] = base_url();
    $config['total_rows'] = $total_rows;
    $config['per_page'] = 4; // ✅ 4 BLOGS PER PAGE
    $config['page_query_string'] = TRUE;
    $config['query_string_segment'] = 'per_page';
    $config['reuse_query_string'] = TRUE;

    $this->pagination->initialize($config);

    // 🔥 FIX NULL WARNING
    $page = (int) $this->input->get('per_page');

    // 🔹 FETCH DATA
    $this->db->where('blogs.status', 'published');

    if($category_id){
        $this->db->where('blogs.category_id', $category_id);
    }

    if($search){
        $this->db->group_start();
        $this->db->like('blogs.title', $search);
        $this->db->or_like('blogs.content', $search);
        $this->db->group_end();
    }

    $data['blogs'] = $this->db
        ->select('blogs.*, categories.name as category_name')
        ->join('categories', 'categories.id = blogs.category_id', 'left')
        ->limit($config['per_page'], $page)
        ->order_by('blogs.id', 'DESC')
        ->get('blogs')
        ->result();

    // 🔹 LINKS
    $data['links'] = $this->pagination->create_links();

    // 🔥 ADD THIS HERE (IMPORTANT)
    $data['recent_posts'] = $this->db
        ->select('id, title, slug, image, created_at')
        ->where('status', 'published')
        ->order_by('id', 'DESC')
        ->limit(5)
        ->get('blogs')
        ->result();

    

    $this->load->view('frontend/blog_list', $data);
}


// public function index() {

//     $category_id = $this->input->get('category');
//     $search = $this->input->get('search');

    // 🔹 categories
    // $data['categories'] = $this->db->get('categories')->result();

    // 🔹 base condition
    // $this->db->where('blogs.status', 'published');

    // 🔹 category filter
    // if($category_id){
    //     $this->db->where('blogs.category_id', $category_id);
    // }

    // 🔹 search filter
    // if($search){
    //     $this->db->group_start();
    //     $this->db->like('blogs.title', $search);
    //     $this->db->or_like('blogs.content', $search);
    //     $this->db->group_end();
    // }

    // $data['blogs'] = $this->db
    //     ->select('blogs.*, categories.name as category_name')
    //     ->join('categories', 'categories.id = blogs.category_id', 'left')
    //     ->order_by('blogs.id', 'DESC')
    //     ->get('blogs')
    //     ->result();

    // $this->load->view('frontend/blog_list', $data);
// }


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