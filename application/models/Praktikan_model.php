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
    // Ambil data praktikan berdasarkan nim
    public function get_praktikan_by_nim($nim) {
        return $this->db->get_where('praktikan', ['nim' => $nim])->row_array();
    }
    // Update data praktikan
    public function update_praktikan($nim, $data) {
        $this->db->where('nim', $nim);
        return $this->db->update('praktikan', $data);
    }
    // Hapus data praktikan berdasarkan nim
    public function delete_praktikan($nim) {
        $this->db->where('nim', $nim);
        return $this->db->delete('praktikan');
    }
} 