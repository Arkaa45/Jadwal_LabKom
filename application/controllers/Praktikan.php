<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Praktikan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Praktikan_model');
    }

    public function index() {
        $data['praktikan'] = $this->Praktikan_model->get_all_praktikan();
        $data['role'] = $this->session->userdata('role');
        $this->load->view('praktikan', $data);
    }

    public function tambah() {
        $data['role'] = $this->session->userdata('role');
        $this->load->view('tambah_praktikan', $data);
    }

    public function simpan() {
        $data = array(
            'nim' => $this->input->post('nim'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'prodi' => $this->input->post('prodi'),
        );
        $this->Praktikan_model->insert_praktikan($data);
        redirect('Praktikan');
    }
} 