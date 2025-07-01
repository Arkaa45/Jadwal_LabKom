<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laboran extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->in_group('laboran')) {
            redirect('auth/login');
        }
    }

    public function index() {
        $this->load->view('dashboard/dashboard_laboran');
    }

    public function dashboard() {
        $this->load->view('dashboard/dashboard_laboran');
    }
}
