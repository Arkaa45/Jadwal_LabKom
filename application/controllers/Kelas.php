<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Kelas_model');
    }

    public function index() {
        $data['kelas'] = $this->Kelas_model->get_all_kelas();
        $data['role'] = $this->session->userdata('role');
        $this->load->view('kelas_praktikum', $data);
    }
} 