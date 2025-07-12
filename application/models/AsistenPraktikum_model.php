<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AsistenPraktikum_model extends CI_Model {
    public function get_all() {
        return $this->db->get('asisten_praktikum')->result_array();
    }
    public function insert($data) {
        return $this->db->insert('asisten_praktikum', $data);
    }
    public function get_by_nidn($nidn) {
        return $this->db->get_where('asisten_praktikum', ['nidn' => $nidn])->row_array();
    }
    public function update($nidn, $data) {
        $this->db->where('nidn', $nidn);
        return $this->db->update('asisten_praktikum', $data);
    }
    public function delete($nidn) {
        $this->db->where('nidn', $nidn);
        return $this->db->delete('asisten_praktikum');
    }
} 