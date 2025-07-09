<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JadwalPraktikum extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('JadwalPraktikum_model');
    }

    public function index() {
        $data['jadwal'] = $this->JadwalPraktikum_model->get_all_jadwal();
        $data['role'] = $this->session->userdata('role');
        $this->load->view('jadwal_praktikum', $data);
    }
} 