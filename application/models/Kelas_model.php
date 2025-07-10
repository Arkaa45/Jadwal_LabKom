<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_model extends CI_Model {
    public function get_all_kelas() {
        return $this->db->get('kelas')->result_array();
    }
} 