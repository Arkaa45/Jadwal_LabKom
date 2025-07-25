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

    public function tambah() {
        $data['role'] = $this->session->userdata('role');
        $this->load->view('tambah_kelas', $data);
    }

    public function simpan() {
        $data = array(
            'nama_kelas' => $this->input->post('nama_kelas'),
            'semester' => $this->input->post('semester'),
        );
        $this->Kelas_model->insert_kelas($data);
        redirect('Kelas');
    }

    public function edit($kode_kelas) {
        $data['role'] = $this->session->userdata('role');
        $data['kelas'] = $this->Kelas_model->get_kelas_by_kode($kode_kelas);
        $this->load->view('edit_kelas', $data);
    }

    public function update($kode_kelas) {
        $data = array(
            'nama_kelas' => $this->input->post('nama_kelas'),
            'semester' => $this->input->post('semester'),
        );
        $this->Kelas_model->update_kelas($kode_kelas, $data);
        redirect('Kelas');
    }

    public function hapus($kode_kelas) {
        $this->Kelas_model->delete_kelas($kode_kelas);
        redirect('Kelas');
    }
} 