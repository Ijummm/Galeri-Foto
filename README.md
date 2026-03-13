# 📸 GalleryFoto - UKK SMK 2026

Aplikasi Galeri Foto berbasis Web yang dibangun menggunakan **Laravel 11**, dirancang untuk memenuhi kriteria Uji Kompetensi Keahlian (UKK) jurusan PPLG/RPL.

![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)
![Bootstrap](https://img.shields.io/badge/bootstrap-%238511FA.svg?style=for-the-badge&logo=bootstrap&logoColor=white)
![MySQL](https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge&logo=mysql&logoColor=white)

## ✨ Fitur Utama
- **Autentikasi**: Login, Register, dan Logout yang aman.
- **Manajemen Foto**: Upload karya (CRUD), Edit, dan Hapus foto.
- **Interaksi Sosial**: 
  - Fitur **Like** (Toggle) dengan tampilan hati minimalis.
  - Fitur **Komentar** untuk setiap foto.
- **Dashboard Koleksi**:
  - Halaman Galeri Utama.
  - Halaman **Disukai** (Menampilkan foto-foto yang di-like oleh pengguna).
- **Keamanan**: Middleware `PreventBackHistory` agar user tidak bisa kembali ke halaman admin setelah logout.

## 🛠️ Persyaratan Sistem
- PHP >= 8.2
- Composer
- MySQL/MariaDB
- Browser (Chrome/Edge/Firefox)

## 🚀 Cara Instalasi

1. **Clone Repository**
   ```bash
   git clone [https://github.com/usernamekamu/gallery-foto.git](https://github.com/usernamekamu/gallery-foto.git)
   cd gallery-foto
