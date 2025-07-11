<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_model extends CI_Model {
    public function get_all_kelas() {
        return $this->db->get('kelas')->result_array();
    }

    public function insert_kelas($data) {
        return $this->db->insert('kelas', $data);
    }

    public function get_kelas_by_kode($kode_kelas) {
        return $this->db->get_where('kelas', ['kode_kelas' => $kode_kelas])->row_array();
    }
    public function update_kelas($kode_kelas, $data) {
        $this->db->where('kode_kelas', $kode_kelas);
        return $this->db->update('kelas', $data);
    }

    public function delete_kelas($kode_kelas) {
        $this->db->where('kode_kelas', $kode_kelas);
        return $this->db->delete('kelas');
    }
} 