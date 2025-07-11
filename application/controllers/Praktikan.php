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
        $nims = $this->input->post('nim');
        $namas = $this->input->post('nama');
        $alamats = $this->input->post('alamat');
        $tgl_lahirs = $this->input->post('tgl_lahir');
        $prodis = $this->input->post('prodi');
        if (is_array($nims)) {
            $count = count($nims);
            for ($i = 0; $i < $count; $i++) {
                // Validasi sederhana: skip jika salah satu field kosong
                if (empty($nims[$i]) || empty($namas[$i]) || empty($alamats[$i]) || empty($tgl_lahirs[$i]) || empty($prodis[$i])) {
                    continue;
                }
                $data = array(
                    'nim' => $nims[$i],
                    'nama' => $namas[$i],
                    'alamat' => $alamats[$i],
                    'tgl_lahir' => $tgl_lahirs[$i],
                    'prodi' => $prodis[$i],
                );
                $this->Praktikan_model->insert_praktikan($data);
            }
        }
        redirect('Praktikan');
    }

    public function edit_multi() {
        $nims = $this->input->post('selected_nim');
        if (!$nims || !is_array($nims) || count($nims) == 0) {
            redirect('Praktikan');
            return;
        }
        $this->load->model('Praktikan_model');
        $praktikan = [];
        foreach ($nims as $nim) {
            $row = $this->Praktikan_model->get_praktikan_by_nim($nim);
            if ($row) $praktikan[] = $row;
        }
        $data['praktikan'] = $praktikan;
        $data['role'] = $this->session->userdata('role');
        $this->load->view('edit_multi_praktikan', $data);
    }

    public function update_multi() {
        $nims = $this->input->post('nim');
        $namas = $this->input->post('nama');
        $alamats = $this->input->post('alamat');
        $tgl_lahirs = $this->input->post('tgl_lahir');
        $prodis = $this->input->post('prodi');
        if (is_array($nims)) {
            $count = count($nims);
            for ($i = 0; $i < $count; $i++) {
                if (empty($nims[$i])) continue;
                $data = array(
                    'nama' => $namas[$i],
                    'alamat' => $alamats[$i],
                    'tgl_lahir' => $tgl_lahirs[$i],
                    'prodi' => $prodis[$i],
                );
                $this->Praktikan_model->update_praktikan($nims[$i], $data);
            }
        }
        redirect('Praktikan');
    }

    public function hapus_multi() {
        $nims = $this->input->post('selected_nim');
        if ($nims && is_array($nims)) {
            foreach ($nims as $nim) {
                $this->Praktikan_model->delete_praktikan($nim);
            }
        }
        redirect('Praktikan');
    }
} 