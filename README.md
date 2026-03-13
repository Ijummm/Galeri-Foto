# 📸 GalleryFoto - UKK SMK 2026

Aplikasi Galeri Foto berbasis Web yang dibangun menggunakan **Laravel 11**. Proyek ini dikembangkan untuk memenuhi kriteria Uji Kompetensi Keahlian (UKK) jurusan Pengembangan Perangkat Lunak dan Gimm (PPLG) / Rekayasa Perangkat Lunak (RPL).

![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)
![Bootstrap](https://img.shields.io/badge/bootstrap-%238511FA.svg?style=for-the-badge&logo=bootstrap&logoColor=white)
![MySQL](https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge&logo=mysql&logoColor=white)

---

## ✨ Fitur Utama

Aplikasi ini mencakup seluruh fitur wajib sesuai instrumen verifikasi UKK:

* **🔒 Autentikasi Keamanan**: Login, Register, dan Logout. Dilengkapi dengan middleware `PreventBackHistory` untuk mencegah akses halaman admin setelah logout.
* **🖼️ Manajemen Galeri (CRUD)**: Pengguna dapat mengunggah foto, memberikan judul, deskripsi, serta mengedit atau menghapus karya mereka sendiri.
* **❤️ Fitur Like (Toggle)**: Sistem interaksi tombol suka dengan ikon hati minimalis dan penghitung jumlah suka secara real-time.
* **💬 Sistem Komentar**: Memungkinkan pengguna berdiskusi dan memberikan feedback pada setiap foto yang diunggah.
* **📂 Koleksi Pribadi**: Halaman khusus **"Disukai"** untuk melihat daftar foto yang pernah disukai oleh pengguna yang sedang login.
* **📱 Responsive UI**: Tampilan bersih dan modern yang menyesuaikan dengan perangkat mobile maupun desktop menggunakan Bootstrap.

---

## 🛠️ Persyaratan Sistem

Sebelum menjalankan proyek, pastikan perangkat Anda memenuhi spesifikasi berikut:
- **PHP** >= 8.2
- **Composer** (Dependency Manager)
- **MySQL / MariaDB**
- **Web Browser** (Chrome, Edge, atau Firefox)

---

## 🚀 Panduan Instalasi

Ikuti langkah-langkah berikut untuk menjalankan proyek di lokal:

### 1. Clone Repository
```bash
git clone [https://github.com/usernamekamu/gallery-foto.git](https://github.com/usernamekamu/gallery-foto.git)
cd gallery-foto
