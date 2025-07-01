<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KepalaLab extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->in_group('kepala_lab')) {
            redirect('auth/login');
        }
    }

    public function index() {
        $this->load->view('dashboard/dashboard_kepala_lab');
    }

    public function dashboard() {
        $this->load->view('dashboard/dashboard_kepala_lab');
    }
}
