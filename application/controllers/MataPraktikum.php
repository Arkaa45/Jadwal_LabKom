<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MataPraktikum extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('MataPraktikum_model');
    }

    public function index() {
        $data['matkum'] = $this->MataPraktikum_model->get_all();
        $data['role'] = $this->session->userdata('role');
        $this->load->view('mata_praktikum', $data);
    }

    public function tambah() {
        $data['role'] = $this->session->userdata('role');
        $this->load->view('tambah_mata_praktikum', $data);
    }
    public function simpan() {
        $data = array(
            'kode_matkum' => $this->input->post('kode_matkum'),
            'nama_matkum' => $this->input->post('nama_matkum'),
            'sks' => $this->input->post('sks'),
            'semester' => $this->input->post('semester'),
        );
        $this->MataPraktikum_model->insert($data);
        redirect('MataPraktikum');
    }
    public function edit($kode) {
        $data['matkum'] = $this->MataPraktikum_model->get_by_kode($kode);
        $data['role'] = $this->session->userdata('role');
        $this->load->view('edit_mata_praktikum', $data);
    }
    public function update($kode) {
        $data = array(
            'nama_matkum' => $this->input->post('nama_matkum'),
            'sks' => $this->input->post('sks'),
            'semester' => $this->input->post('semester'),
        );
        $this->MataPraktikum_model->update($kode, $data);
        redirect('MataPraktikum');
    }
    public function hapus($kode) {
        $this->MataPraktikum_model->delete($kode);
        redirect('MataPraktikum');
    }
} 