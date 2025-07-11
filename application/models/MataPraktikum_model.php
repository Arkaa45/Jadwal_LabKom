<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MataPraktikum_model extends CI_Model {
    public function get_all() {
        return $this->db->get('mata_praktikum')->result_array();
    }
    public function insert($data) {
        return $this->db->insert('mata_praktikum', $data);
    }
    public function get_by_kode($kode) {
        return $this->db->get_where('mata_praktikum', ['kode_matkum' => $kode])->row_array();
    }
    public function update($kode, $data) {
        $this->db->where('kode_matkum', $kode);
        return $this->db->update('mata_praktikum', $data);
    }
    public function delete($kode) {
        $this->db->where('kode_matkum', $kode);
        return $this->db->delete('mata_praktikum');
    }
} 