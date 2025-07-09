<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JadwalPraktikum_model extends CI_Model {
    // Ambil semua data jadwal praktikum
    public function get_all_jadwal() {
        return $this->db->get('jadwal_praktikum')->result_array();
    }
    // Tambahan fungsi lain (insert, update, delete) bisa dibuat sesuai kebutuhan
} 