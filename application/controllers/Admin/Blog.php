<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->checkLogin();
        $this->checkAdmin();
    }

    // 🔹 LIST
    public function index() {
      $this->db->where('status', 'published');
        $data['blogs'] = $this->db
            ->select('blogs.*, categories.name as category_name')
            ->join('categories', 'categories.id = blogs.category_id', 'left')
            ->get('blogs')
            ->result();

        $this->load->view('admin/blog/index', $data);
    }

    public function detail($slug) {

        $this->db->where('status', 'published');

        $data['blog'] = $this->db
            ->select('blogs.*, categories.name as category_name')
            ->join('categories', 'categories.id = blogs.category_id', 'left')
            ->where('slug', $slug)
            ->get('blogs')
            ->row();

        $this->load->view('frontend/blog_detail', $data);
    }

    // 🔹 CREATE PAGE
    public function create() {
        $data['categories'] = $this->db->get('categories')->result();
        $this->load->view('admin/blog/create', $data);
    }

    // 🔹 STORE
    public function store() {

      $config['upload_path'] = './uploads/';
      $config['allowed_types'] = 'jpg|png|jpeg';
      $config['encrypt_name'] = TRUE;

      $this->load->library('upload', $config);

      $image = null;

      if($this->upload->do_upload('image')) {
          $uploadData = $this->upload->data();
          $image = $uploadData['file_name'];
      }

      $slug = url_title($this->input->post('title'), 'dash', TRUE);

      $data = [
          'title' => $this->input->post('title'),
          'slug' => $slug,
          'content' => $this->input->post('content'),
          'image' => $image,
          'category_id' => $this->input->post('category_id'),
          'status' => $this->input->post('status') ?: 'draft',
          'created_at' => date('Y-m-d H:i:s')
      ];

      $this->db->insert('blogs', $data);

      redirect('admin/blog');
    }

    // 🔹 EDIT PAGE
    public function edit($id) {
        $data['blog'] = $this->db->get_where('blogs', ['id' => $id])->row();
        $data['categories'] = $this->db->get('categories')->result();

        $this->load->view('admin/blog/edit', $data);
    }

    // 🔹 UPDATE
    public function update($id) {

        $blog = $this->db->get_where('blogs', ['id' => $id])->row();

        // 👉 IMAGE UPDATE (optional)
        if(!empty($_FILES['image']['name'])) {

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if($this->upload->do_upload('image')) {
                $uploadData = $this->upload->data();

                // delete old image
                if(file_exists('./uploads/'.$blog->image)){
                    unlink('./uploads/'.$blog->image);
                }

                $image = $uploadData['file_name'];
            }
        } else {
            $image = $blog->image;
        }

        $slug = url_title($this->input->post('title'), 'dash', TRUE);

        $data = [
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'content' => $this->input->post('content'),
            'image' => $image,
            'category_id' => $this->input->post('category_id'),
        ];

        $this->db->where('id', $id)->update('blogs', $data);

        redirect('admin/blog');
    }

    // 🔹 DELETE
    public function delete($id) {

        $blog = $this->db->get_where('blogs', ['id' => $id])->row();

        if(file_exists('./uploads/'.$blog->image)){
            unlink('./uploads/'.$blog->image);
        }

        $this->db->delete('blogs', ['id' => $id]);

        redirect('admin/blog');
    }
}