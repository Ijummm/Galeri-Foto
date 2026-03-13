### Cara Menggunakan:

1. Buat file baru bernama `README.md` di folder paling luar proyek Laravel kamu.
2. *Copy-paste* kode di bawah ini ke dalam file tersebut.

```markdown
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

```

2. **Instal Dependensi**
```bash
composer install

```


3. **Konfigurasi Environment**
Salin file `.env.example` menjadi `.env`, lalu sesuaikan konfigurasi database Anda.
```bash
cp .env.example .env
php artisan key:generate

```


4. **Migrasi Database**
Pastikan database sudah dibuat di phpMyAdmin, lalu jalankan:
```bash
php artisan migrate

```


5. **Simpanan File (Storage Link)**
Lakukan link storage agar gambar yang diupload muncul di browser:
```bash
php artisan storage:link

```


6. **Jalankan Aplikasi**
```bash
php artisan serve

```


Akses di: `http://127.0.0.1:8000`

## 📂 Struktur Database (UKK Standard)

* `users`: Menyimpan data pengguna.
* `foto`: Menyimpan informasi detail foto dan lokasi file.
* `komentarfoto`: Menyimpan interaksi komentar antar pengguna.
* `likefoto`: Menyimpan data suka (likes).
* `album` (Optional): Pengelompokan foto berdasarkan album.


## 🖼️ Tampilan Aplikasi

Berikut adalah gambaran antarmuka dari aplikasi GalleryFoto:

| Dashboard Utama | Detail Foto & Komentar |
| :---: | :---: |
| ![Dashboard Utama](screenshots/dashboard.png) | ![Detail Foto](screenshots/detail.png) |

> **Catatan:** Untuk menampilkan gambar milikmu sendiri, buat folder bernama `screenshots` di root folder proyek, simpan gambar di sana dengan nama yang sesuai, lalu lakukan `git add`, `commit`, dan `push`.
