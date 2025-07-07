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
        $this->load->model('Dashboard_model');
        $data['praktikan'] = $this->Dashboard_model->get_praktikan_per_prodi();
        $data['kelas'] = $this->Dashboard_model->get_kelas_per_kategori();
        $data['mata_praktikum'] = $this->Dashboard_model->get_mata_praktikum_per_semester();
        $data['asisten'] = $this->Dashboard_model->get_asisten_per_prodi();
        $this->load->view('dashboard/dashboard_kepala_lab', $data);
    }

    public function dashboard() {
        redirect('kepalalab');
    }
}
