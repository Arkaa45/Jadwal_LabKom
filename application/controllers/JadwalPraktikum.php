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

    public function tambah() {
        $data['role'] = $this->session->userdata('role');
        $this->load->view('tambah_jadwal_praktikum', $data);
    }

    public function simpan() {
        $data = array(
            'tahun_ajaran' => $this->input->post('tahun_ajaran'),
            'kode_matkum' => $this->input->post('kode_matkum'),
            'nidn' => $this->input->post('nidn'),
            'kode_ruang' => $this->input->post('kode_ruang'),
            'kode_kelas' => $this->input->post('kode_kelas'),
            'hari' => $this->input->post('hari'),
            'waktu_mulai' => $this->input->post('waktu_mulai'),
            'waktu_selesai' => $this->input->post('waktu_selesai'),
        );
        $this->JadwalPraktikum_model->insert_jadwal($data);
        redirect('JadwalPraktikum');
    }
} 