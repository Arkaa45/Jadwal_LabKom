<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RuangLab extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('RuangLab_model');
    }

    public function index() {
        $data['ruang'] = $this->RuangLab_model->get_all();
        $data['role'] = $this->session->userdata('role');
        $this->load->view('ruang_lab', $data);
    }

    public function tambah() {
        $data['role'] = $this->session->userdata('role');
        $this->load->view('tambah_ruang_lab', $data);
    }

    public function simpan() {
        $data = array(
            'kode_ruang' => $this->input->post('kode_ruang'),
            'nama_ruang' => $this->input->post('nama_ruang'),
            'lokasi' => $this->input->post('lokasi'),
        );
        $this->RuangLab_model->insert($data);
        redirect('RuangLab');
    }

    public function edit($kode) {
        $data['ruang'] = $this->RuangLab_model->get_by_kode($kode);
        $data['role'] = $this->session->userdata('role');
        $this->load->view('edit_ruang_lab', $data);
    }

    public function update($kode) {
        $data = array(
            'nama_ruang' => $this->input->post('nama_ruang'),
            'lokasi' => $this->input->post('lokasi'),
        );
        $this->RuangLab_model->update($kode, $data);
        redirect('RuangLab');
    }

    public function hapus($kode) {
        $this->RuangLab_model->delete($kode);
        redirect('RuangLab');
    }
} 