<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Praktikan_model extends CI_Model {
    // Ambil semua data praktikan
    public function get_all_praktikan() {
        return $this->db->get('praktikan')->result_array();
    }
    // Tambah data praktikan
    public function insert_praktikan($data) {
        return $this->db->insert('praktikan', $data);
    }
} 