<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JadwalPraktikum_model extends CI_Model {
    // Ambil semua data jadwal praktikum
    public function get_all_jadwal() {
        return $this->db->get('jadwal_praktikum')->result_array();
    }
    // Tambah data jadwal praktikum
    public function insert_jadwal($data) {
        return $this->db->insert('jadwal_praktikum', $data);
    }
    // Ambil semua data mata praktikum
    public function get_all_mata_praktikum() {
        return $this->db->get('mata_praktikum')->result_array();
    }
    // Ambil semua data asisten praktikum
    public function get_all_asisten() {
        return $this->db->get('asisten_praktikum')->result_array();
    }
    // Ambil semua data ruang lab
    public function get_all_ruang_lab() {
        return $this->db->get('ruang_lab')->result_array();
    }
    // Ambil semua data kelas
    public function get_all_kelas() {
        return $this->db->get('kelas')->result_array();
    }
    // Ambil semua data jadwal praktikum beserta nama dosen asisten
    public function get_jadwal_with_nama_dosen() {
        $this->db->select('jadwal_praktikum.*, asisten_praktikum.nama_dosen');
        $this->db->from('jadwal_praktikum');
        $this->db->join('asisten_praktikum', 'jadwal_praktikum.nidn = asisten_praktikum.nidn', 'left');
        return $this->db->get()->result_array();
    }
    // Ambil semua data jadwal praktikum beserta nama dosen asisten, nama matkum, ruang, dan kelas
    public function get_jadwal_with_nama_referensi() {
        $this->db->select('jadwal_praktikum.*, asisten_praktikum.nama_dosen, mata_praktikum.nama_matkum, ruang_lab.nama_ruang, kelas.nama_kelas');
        $this->db->from('jadwal_praktikum');
        $this->db->join('asisten_praktikum', 'jadwal_praktikum.nidn = asisten_praktikum.nidn', 'left');
        $this->db->join('mata_praktikum', 'jadwal_praktikum.kode_matkum = mata_praktikum.kode_matkum', 'left');
        $this->db->join('ruang_lab', 'jadwal_praktikum.kode_ruang = ruang_lab.kode_ruang', 'left');
        $this->db->join('kelas', 'jadwal_praktikum.kode_kelas = kelas.kode_kelas', 'left');
        return $this->db->get()->result_array();
    }
    // Ambil data jadwal praktikum berdasarkan id
    public function get_jadwal_by_id($id) {
        return $this->db->get_where('jadwal_praktikum', ['id_jadwal_praktikum' => $id])->row_array();
    }
    // Update data jadwal praktikum
    public function update_jadwal($id, $data) {
        $this->db->where('id_jadwal_praktikum', $id);
        return $this->db->update('jadwal_praktikum', $data);
    }
    // Hapus data jadwal praktikum
    public function delete_jadwal($id) {
        $this->db->where('id_jadwal_praktikum', $id);
        return $this->db->delete('jadwal_praktikum');
    }
    // Tambahan fungsi lain (insert, update, delete) bisa dibuat sesuai kebutuhan
} 