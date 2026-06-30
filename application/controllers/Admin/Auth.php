<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('email');
        $this->load->config('email');
    }

    // 🔹 LOGIN PAGE View
    public function login() {
        $this->load->view('admin/auth/login');
    }

    // 🔹 LOGIN Function SUBMIT
    public function loginSubmit() {
        $email = $this->input->post('email');
        $password = $this->input->post('password'); // ❗ no md5

        // get user by email only
        $user = $this->db->get_where('users', [
            'email' => $email
        ])->row();

        // echo '<pre>';
        // print_r($user);
        // echo '</pre>';

        // verify password
        if($user && password_verify($password, $user->password)) {

            $this->session->set_userdata([
            'user_id'   => $user->id,
            'user_name' => $user->name,
            'role'      => $user->role,
            'logged_in' => true
        ]);

        $this->session->set_flashdata('success', 'Login successful');
            // 🔥 Role-based redirect
            if($user->role == 'admin'){
                redirect('admin/dashboard');
                } else {
                redirect('user/dashboard'); // ✅ user goes here
            }
        } else {
            $this->session->set_flashdata('error', 'Invalid email or password');
            redirect('admin/login');
        }
    }

    // 🔹 REGISTER PAGE
    public function register() {
        $this->load->view('admin/auth/register');
    }

    public function registerSubmit() {

    $data = [
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email'),
        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        'role' => 'user'
    ];

    // 🔹 INSERT USER
    $this->db->insert('users', $data);

    // 🔹 SEND EMAIL
    $this->email->from('aakashroymj@gmail.com', 'My Blog');
    $this->email->to($data['email']);

    $this->email->subject('Welcome to My Blog');

    $message = "
        <h2>Welcome ".$data['name']." 👋</h2>

        <p>Thank you for registering on our blog website.</p>

        <p>We are excited to have you with us.</p>

        <br>

        <a href='".base_url('admin/login')."'>
            Login Now
        </a>
    ";

    $this->email->message($message);

    // 🔹 SEND
    if($this->email->send()) {

        $this->session->set_flashdata(
            'success',
            'Registration successful. Welcome email sent.'
        );

    } else {

        // DEBUG ERROR
        echo $this->email->print_debugger();
        die();
    }

    redirect('admin/login');
}

    // 🔹 REGISTER SUBMIT
    // public function registerSubmit() {

    //     $data = [
    //         'name' => $this->input->post('name'),
    //         'email' => $this->input->post('email'),
    //         'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
    //         'role' => 'user'
    //     ];

    //     $this->db->insert('users', $data);
    //     $this->session->set_flashdata('success', 'Registration successful. Please login.');
    //     redirect('admin/login');
    // }

    // 🔹 LOGOUT Function 
    public function logout(){
        $this->session->sess_destroy(); // better than unset
        redirect('admin/auth/login');
    }
}