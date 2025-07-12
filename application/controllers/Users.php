<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->in_group('admin')) {
            redirect('auth/login');
        }
    }

    public function index() {
        $this->load->model('Users_model');
        $data['users'] = $this->Users_model->get_all_with_roles();
        $data['role'] = $this->session->userdata('role');
        $this->load->view('users', $data);
    }
} 