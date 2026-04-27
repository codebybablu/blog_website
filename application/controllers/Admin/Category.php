<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // 🔒 Session check
        if(!$this->session->userdata('admin_id')){
            redirect('admin/login');
        }
    }

    // 📋 List categories
    public function index() {
        $data['categories'] = $this->db->get('categories')->result();
        $this->load->view('admin/category/index', $data);
    }

    // ➕ Add category form
    public function create() {
        $this->load->view('admin/category/create');
    }

    // 💾 Save category
    public function store() {
        $data = [
            'name' => $this->input->post('name')
        ];

        $this->db->insert('categories', $data);
        redirect('admin/category');
    }

    // ❌ Delete category
    public function delete($id) {
        $this->db->delete('categories', ['id' => $id]);
        redirect('admin/category');
    }
}