# Font Awesome Local Installation

## 📥 Cara Download Font Files

Untuk menggunakan Font Awesome secara local, Anda perlu download file font berikut:

### 1. Download dari Font Awesome Website
Kunjungi: https://fontawesome.com/download

### 2. File yang Diperlukan
Setelah download, copy file berikut ke folder `assets/fonts/`:

```
assets/fonts/
├── fa-solid-900.woff2
├── fa-solid-900.ttf
├── fa-regular-400.woff2
├── fa-regular-400.ttf
├── fa-brands-400.woff2
└── fa-brands-400.ttf
```

### 3. Alternatif Download
Jika tidak bisa download dari website resmi, gunakan CDN sementara:

```html
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
```

### 4. Verifikasi
Setelah file font terinstall, pastikan icon-icon berikut berfungsi:
- ✅ fa-laptop-code (logo)
- ✅ fa-user (user icon)
- ✅ fa-envelope (email icon)
- ✅ fa-lock (lock icon)
- ✅ fa-key (key icon)
- ✅ fa-sign-in-alt (login icon)
- ✅ fa-question-circle (help icon)
- ✅ fa-arrow-left (back icon)
- ✅ fa-university (university icon)
- ✅ fa-info-circle (info icon)
- ✅ fa-paper-plane (send icon)
- ✅ fa-save (save icon)
- ✅ fa-shield-alt (security icon)
- ✅ fa-eye (show password)
- ✅ fa-eye-slash (hide password)
- ✅ fa-spinner (loading icon)

## 🔧 Troubleshooting

### Icon Tidak Muncul
1. Pastikan file font ada di folder yang benar
2. Periksa path di CSS file
3. Clear browser cache
4. Periksa console browser untuk error

### Font Loading Error
1. Periksa permission folder
2. Pastikan file tidak corrupt
3. Coba gunakan format .ttf sebagai fallback

## 📝 Note
File font ini hanya berisi icon yang digunakan dalam aplikasi untuk menghemat ukuran file. 