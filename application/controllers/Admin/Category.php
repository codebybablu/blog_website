<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    // 🔹 List
    public function index() {
        $data['categories'] = $this->db->get('categories')->result();
        $this->load->view('admin/category/index', $data);
    }

    // 🔹 Create form
    public function create() {
        $this->load->view('admin/category/create');
    }

    // 🔹 Store
    public function store() {
        $name = $this->input->post('name');

        $data = [
            'name' => $name,
            'slug' => url_title($name, '-', TRUE)
        ];

        $this->db->insert('categories', $data);

        redirect('admin/category');
    }

    // 🔹 Edit
    public function edit(int $id) {
        $data['category'] = $this->db->get_where('categories', ['id'=>$id])->row();
        $this->load->view('admin/category/edit', $data);
    }

    // 🔹 Update
    public function update(int $id) {
        $name = $this->input->post('name');

        $data = [
            'name' => $name,
            'slug' => url_title($name, '-', TRUE)
        ];

        $this->db->update('categories', $data, ['id'=>$id]);

        redirect('admin/category');
    }

    // 🔹 Delete
    public function delete(int $id) {
        $this->db->delete('categories', ['id'=>$id]);
        redirect('admin/category');
    }
}