<?php
/**
 * Sidebar Helper
 * Helper untuk menangani sidebar di aplikasi
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Render sidebar berdasarkan role user
 */
function render_sidebar($role = null, $active_menu = 'dashboard') {
    $CI =& get_instance();
    
    // Jika role tidak diberikan, coba ambil dari session
    if (!$role) {
        $role = $CI->session->userdata('role');
    }
    
    // Render sidebar berdasarkan role
    if ($role == 'admin') {
        return $CI->load->view('sidebar_admin', compact('active_menu'), true);
    } elseif ($role == 'kepala_lab') {
        return $CI->load->view('sidebar_kepala_lab', compact('active_menu'), true);
    } elseif ($role == 'laboran') {
        return $CI->load->view('sidebar_laboran', compact('active_menu'), true);
    } else {
        // Fallback ke sidebar default
        return $CI->load->view('sidebar', compact('active_menu'), true);
    }
}

/**
 * Get content class berdasarkan role
 */
function get_content_class($role = null) {
    if (!$role) {
        $CI =& get_instance();
        $role = $CI->session->userdata('role');
    }
    
    if (in_array($role, ['admin', 'kepala_lab', 'laboran'])) {
        return 'col-md-10';
    } else {
        return 'col-md-12';
    }
}

/**
 * Check apakah user memiliki sidebar
 */
function has_sidebar($role = null) {
    if (!$role) {
        $CI =& get_instance();
        $role = $CI->session->userdata('role');
    }
    
    return in_array($role, ['admin', 'kepala_lab', 'laboran']);
}

/**
 * Get sidebar data untuk view
 */
function get_sidebar_data($role = null, $active_menu = 'dashboard') {
    return [
        'has_sidebar' => has_sidebar($role),
        'content_class' => get_content_class($role),
        'sidebar_html' => render_sidebar($role, $active_menu)
    ];
} 