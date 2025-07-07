<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {
    // Jumlah praktikan per prodi
    public function get_praktikan_per_prodi() {
        return $this->db->select('prodi, COUNT(*) as total')
            ->from('praktikan')
            ->group_by('prodi')
            ->get()->result_array();
    }

    // Jumlah kelas per kategori (misal IF, SI, FTI)
    public function get_kelas_per_kategori() {
        return $this->db->select('semester, COUNT(*) as total')
            ->from('kelas')
            ->group_by('semester')
            ->get()->result_array();
    }

    // Jumlah mata praktikum per semester
    public function get_mata_praktikum_per_semester() {
        return $this->db->select('semester, COUNT(*) as total')
            ->from('mata_praktikum')
            ->group_by('semester')
            ->get()->result_array();
    }

    // Jumlah asisten praktikum per prodi
    public function get_asisten_per_prodi() {
        return $this->db->select('prodi, COUNT(*) as total')
            ->from('asisten_praktikum')
            ->group_by('prodi')
            ->get()->result_array();
    }
} 