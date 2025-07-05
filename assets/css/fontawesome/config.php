<?php
/**
 * Konfigurasi Font Awesome
 * File ini mengatur penggunaan Font Awesome di aplikasi
 */

// Konfigurasi Font Awesome
$fontAwesomeConfig = [
    'version' => '6.0.0',
    'use_local' => true,
    'use_cdn' => false,
    'fallback_enabled' => true,
    'icons_used' => [
        'fa-laptop-code',    // Logo aplikasi
        'fa-user',           // User icon
        'fa-envelope',       // Email icon
        'fa-lock',           // Lock icon
        'fa-key',            // Key icon
        'fa-sign-in-alt',    // Login icon
        'fa-question-circle', // Help icon
        'fa-arrow-left',     // Back icon
        'fa-university',     // University icon
        'fa-info-circle',    // Info icon
        'fa-paper-plane',    // Send icon
        'fa-save',           // Save icon
        'fa-shield-alt',     // Security icon
        'fa-eye',            // Show password
        'fa-eye-slash',      // Hide password
        'fa-spinner'         // Loading icon
    ],
    'font_files' => [
        'fa-solid-900.woff2',
        'fa-solid-900.ttf',
        'fa-regular-400.woff2',
        'fa-regular-400.ttf',
        'fa-brands-400.woff2',
        'fa-brands-400.ttf'
    ]
];

// Fungsi untuk mengecek apakah font files tersedia
function checkFontFiles($config) {
    $fontsDir = 'assets/fonts/';
    $missingFiles = [];
    
    foreach ($config['font_files'] as $file) {
        if (!file_exists($fontsDir . $file)) {
            $missingFiles[] = $file;
        }
    }
    
    return $missingFiles;
}

// Fungsi untuk mendapatkan CSS link yang sesuai
function getFontAwesomeCSS($config) {
    $missingFiles = checkFontFiles($config);
    
    if (empty($missingFiles) && $config['use_local']) {
        return base_url('assets/css/fontawesome/all.min.css');
    } else {
        // Fallback ke CDN jika file local tidak tersedia
        return 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/' . $config['version'] . '/css/all.min.css';
    }
}

// Fungsi untuk menampilkan status Font Awesome
function getFontAwesomeStatus($config) {
    $missingFiles = checkFontFiles($config);
    
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

// Export konfigurasi
return $fontAwesomeConfig;
?> 