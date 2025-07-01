<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // cek jika belum login atau bukan admin
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->in_group('admin')) {
            redirect('auth/login');
        }
    }

    public function index() {
        $this->load->view('dashboard/dashboard_admin');
    }

    public function dashboard() {
        $this->load->view('dashboard/dashboard_admin');
    }
}
