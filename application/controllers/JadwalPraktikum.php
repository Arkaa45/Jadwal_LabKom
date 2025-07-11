<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JadwalPraktikum extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('JadwalPraktikum_model');
    }

    public function index() {
        $data['jadwal'] = $this->JadwalPraktikum_model->get_jadwal_with_nama_referensi();
        $data['role'] = $this->session->userdata('role');
        $this->load->view('jadwal_praktikum', $data);
    }

    public function tambah() {
        $data['role'] = $this->session->userdata('role');
        $data['mata_praktikum'] = $this->JadwalPraktikum_model->get_all_mata_praktikum();
        $data['asisten'] = $this->JadwalPraktikum_model->get_all_asisten();
        $data['ruang_lab'] = $this->JadwalPraktikum_model->get_all_ruang_lab();
        $data['kelas'] = $this->JadwalPraktikum_model->get_all_kelas();
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

    public function edit($id = null) {
        if ($id === null) {
            show_404();
            return;
        }
        $data['role'] = $this->session->userdata('role');
        $data['jadwal'] = $this->JadwalPraktikum_model->get_jadwal_by_id($id);
        if (!$data['jadwal']) {
            show_404();
            return;
        }
        $data['mata_praktikum'] = $this->JadwalPraktikum_model->get_all_mata_praktikum();
        $data['asisten'] = $this->JadwalPraktikum_model->get_all_asisten();
        $data['ruang_lab'] = $this->JadwalPraktikum_model->get_all_ruang_lab();
        $data['kelas'] = $this->JadwalPraktikum_model->get_all_kelas();
        $this->load->view('edit_jadwal_praktikum', $data);
    }

    public function update($id) {
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
        $this->JadwalPraktikum_model->update_jadwal($id, $data);
        redirect('JadwalPraktikum');
    }

    public function delete($id = null) {
        if ($id === null) {
            show_404();
            return;
        }
        $this->JadwalPraktikum_model->delete_jadwal($id);
        redirect('JadwalPraktikum');
    }
} 