<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RuangLab_model extends CI_Model {
    public function get_all() {
        return $this->db->get('ruang_lab')->result_array();
    }
    public function insert($data) {
        return $this->db->insert('ruang_lab', $data);
    }
    public function get_by_kode($kode) {
        return $this->db->get_where('ruang_lab', ['kode_ruang' => $kode])->row_array();
    }
    public function update($kode, $data) {
        $this->db->where('kode_ruang', $kode);
        return $this->db->update('ruang_lab', $data);
    }
    public function delete($kode) {
        $this->db->where('kode_ruang', $kode);
        return $this->db->delete('ruang_lab');
    }
} 