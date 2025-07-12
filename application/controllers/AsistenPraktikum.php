<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AsistenPraktikum extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('AsistenPraktikum_model');
    }

    public function index() {
        $data['asisten'] = $this->AsistenPraktikum_model->get_all();
        $data['role'] = $this->session->userdata('role');
        $this->load->view('asisten_praktikum', $data);
    }
    public function tambah() {
        $data['role'] = $this->session->userdata('role');
        $this->load->view('tambah_asisten_praktikum', $data);
    }
    public function simpan() {
        $data = array(
            'nidn' => $this->input->post('nidn'),
            'nama_dosen' => $this->input->post('nama_dosen'),
            'alamat' => $this->input->post('alamat'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'prodi' => $this->input->post('prodi'),
        );
        $this->AsistenPraktikum_model->insert($data);
        redirect('AsistenPraktikum');
    }
    public function edit($nidn) {
        $data['asisten'] = $this->AsistenPraktikum_model->get_by_nidn($nidn);
        $data['role'] = $this->session->userdata('role');
        $this->load->view('edit_asisten_praktikum', $data);
    }
    public function update($nidn) {
        $data = array(
            'nama_dosen' => $this->input->post('nama_dosen'),
            'alamat' => $this->input->post('alamat'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'prodi' => $this->input->post('prodi'),
        );
        $this->AsistenPraktikum_model->update($nidn, $data);
        redirect('AsistenPraktikum');
    }
    public function hapus($nidn) {
        $this->AsistenPraktikum_model->delete($nidn);
        redirect('AsistenPraktikum');
    }
} 