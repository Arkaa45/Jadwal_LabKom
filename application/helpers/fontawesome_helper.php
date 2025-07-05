<?php
/**
 * Font Awesome Helper
 * Helper untuk mengelola Font Awesome di aplikasi
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Mendapatkan CSS link Font Awesome yang sesuai
 */
function get_fontawesome_css() {
    $fontsDir = FCPATH . 'assets/fonts/';
    $requiredFiles = [
        'fa-solid-900.woff2',
        'fa-solid-900.ttf',
        'fa-regular-400.woff2',
        'fa-regular-400.ttf',
        'fa-brands-400.woff2',
        'fa-brands-400.ttf'
    ];
    
    // Cek apakah semua file font tersedia
    $allFilesExist = true;
    foreach ($requiredFiles as $file) {
        if (!file_exists($fontsDir . $file)) {
            $allFilesExist = false;
            break;
        }
    }
    
    if ($allFilesExist) {
        // Sementara gunakan quick fix untuk memastikan icon muncul
        return base_url('assets/css/fontawesome/quick-fix.css');
    } else {
        // Fallback ke hybrid CSS (CDN + local fallback)
        return base_url('assets/css/fontawesome/hybrid.css');
    }
}

/**
 * Mendapatkan status Font Awesome
 */
function get_fontawesome_status() {
    $fontsDir = FCPATH . 'assets/fonts/';
    $requiredFiles = [
        'fa-solid-900.woff2',
        'fa-solid-900.ttf',
        'fa-regular-400.woff2',
        'fa-regular-400.ttf',
        'fa-brands-400.woff2',
        'fa-brands-400.ttf'
    ];
    
    $missingFiles = [];
    foreach ($requiredFiles as $file) {
        if (!file_exists($fontsDir . $file)) {
            $missingFiles[] = $file;
        }
    }
    
    if (empty($missingFiles)) {
        return [
            'status' => 'success',
            'message' => 'Font Awesome local tersedia',
            'missing_files' => []
        ];
    } else {
        return [
            'status' => 'warning',
            'message' => 'Beberapa file font tidak tersedia, menggunakan CDN',
            'missing_files' => $missingFiles
        ];
    }
}

/**
 * Render Font Awesome CSS link
 */
function render_fontawesome_css() {
    $cssUrl = get_fontawesome_css();
    return '<link rel="stylesheet" href="' . $cssUrl . '">';
}

/**
 * Mendapatkan daftar icon yang digunakan dalam aplikasi
 */
function get_used_icons() {
    return [
        'fa-laptop-code' => 'Logo aplikasi',
        'fa-user' => 'User icon',
        'fa-envelope' => 'Email icon',
        'fa-lock' => 'Lock icon',
        'fa-key' => 'Key icon',
        'fa-sign-in-alt' => 'Login icon',
        'fa-question-circle' => 'Help icon',
        'fa-arrow-left' => 'Back icon',
        'fa-university' => 'University icon',
        'fa-info-circle' => 'Info icon',
        'fa-paper-plane' => 'Send icon',
        'fa-save' => 'Save icon',
        'fa-shield-alt' => 'Security icon',
        'fa-eye' => 'Show password',
        'fa-eye-slash' => 'Hide password',
        'fa-spinner' => 'Loading icon'
    ];
}

/**
 * Validasi icon Font Awesome
 */
function validate_fontawesome_icon($iconClass) {
    $usedIcons = array_keys(get_used_icons());
    return in_array($iconClass, $usedIcons);
}

/**
 * Mendapatkan fallback icon (emoji)
 */
function get_icon_fallback($iconClass) {
    $fallbacks = [
        'fa-laptop-code' => '💻',
        'fa-user' => '👤',
        'fa-envelope' => '📧',
        'fa-lock' => '🔒',
        'fa-key' => '🔑',
        'fa-sign-in-alt' => '➡️',
        'fa-question-circle' => '❓',
        'fa-arrow-left' => '⬅️',
        'fa-university' => '🏛️',
        'fa-info-circle' => 'ℹ️',
        'fa-paper-plane' => '📤',
        'fa-save' => '💾',
        'fa-shield-alt' => '🛡️',
        'fa-eye' => '👁️',
        'fa-eye-slash' => '🙈',
        'fa-spinner' => '⏳'
    ];
    
    return isset($fallbacks[$iconClass]) ? $fallbacks[$iconClass] : '📌';
}

/**
 * Render icon dengan fallback
 */
function render_icon($iconClass, $fallback = true) {
    if (!validate_fontawesome_icon($iconClass)) {
        return $fallback ? get_icon_fallback($iconClass) : '';
    }
    
    $status = get_fontawesome_status();
    if ($status['status'] === 'warning' && $fallback) {
        return '<span class="' . $iconClass . '" title="' . get_used_icons()[$iconClass] . '">' . get_icon_fallback($iconClass) . '</span>';
    }
    
    return '<i class="' . $iconClass . '" title="' . get_used_icons()[$iconClass] . '"></i>';
}
?> 