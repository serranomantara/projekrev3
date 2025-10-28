# Web Desa Wukirsari

Portal informasi resmi Desa Wukirsari. Website ini dibangun menggunakan HTML, CSS, JavaScript untuk frontend dan PHP untuk backend.

## Fitur Utama

- **Halaman Depan**: Menampilkan informasi umum dan 8 menu layanan desa
- **Sistem Login**:
  - Admin (administrator web)
  - Petugas (user)
- **8 Menu Layanan**:
  1. Sekretariat - Administrasi dan pelayanan umum
  2. Tata Laksana - Tata kelola pemerintahan
  3. Danarta - Informasi keuangan
  4. Pangripta - Pembangunan infrastruktur
  5. Jagabaya - Keamanan dan ketertiban
  6. Ulu-Ulu - Pengelolaan irigasi
  7. Kamituwa - Musyawarah masyarakat
  8. PPID - Pengelola Informasi dan Dokumentasi

## Instalasi

### Persyaratan

- XAMPP (PHP 7.4+ dan MySQL)
- Web Browser modern

### Langkah Instalasi

1. **Clone atau Copy Project**

   ```
   Copy folder projek_rev3 ke: c:\xampp\htdocs\
   ```

2. **Import Database**

   - Buka phpMyAdmin (http://localhost/phpmyadmin)
   - Klik "Import"
   - Pilih file `wukirsari_db.sql`
   - Klik "Go"

3. **Jalankan XAMPP**

   - Start Apache
   - Start MySQL

4. **Akses Website**
   - Frontend: http://localhost/projek_rev3/
   - Login: http://localhost/projek_rev3/login.php

## Kredensial Login

### Administrator

- Username: `admin`
- Password: `admin123`

### Petugas

- Username: `petugas`
- Password: `petugas123`

## Struktur Folder

```
projek_rev3/
├── admin/              # Dashboard dan CRUD untuk admin
├── user/               # Dashboard untuk petugas
├── assets/
│   ├── css/           # File CSS
│   └── js/            # File JavaScript
├── config/            # Konfigurasi database
├── pages/             # Halaman publik (8 menu)
├── uploads/           # Folder untuk upload file
├── index.html         # Halaman utama
├── login.php          # Halaman login
└── wukirsari_db.sql   # Database SQL

```

## Database

Database: `wukirsari_db`

Tabel utama:

- `users` - Data pengguna (admin & petugas)
- `sekretariat` - Data sekretariat
- `tata_laksana` - Data tata laksana
- `danarta` - Data keuangan
- `pangripta` - Data pembangunan
- `jagabaya` - Data keamanan
- `ulu_ulu` - Data irigasi
- `kamituwa` - Data musyawarah
- `ppid` - Data informasi publik
- `settings` - Pengaturan website

## Teknologi yang Digunakan

### Frontend

- HTML5
- CSS3 (dengan CSS Variables)
- JavaScript (Vanilla JS)
- Font Awesome 6.4.0 (Icons)

### Backend

- PHP 7.4+
- MySQL (MariaDB)

## Fitur Dashboard

### Dashboard Admin

- Kelola semua menu layanan (CRUD)
- Manajemen user
- Statistik data
- Upload gambar/dokumen

### Dashboard Petugas

- Lihat dan kelola data
- Input informasi baru
- Update data existing

## Catatan Penting

1. **Keamanan**:

   - Password di-hash menggunakan `password_hash()` PHP
   - Validasi session untuk setiap halaman admin/user
   - Escape input menggunakan `mysqli_real_escape_string()`

2. **Folder Uploads**:

   - Buat folder `uploads` jika belum ada
   - Set permission yang sesuai untuk upload file

3. **Konfigurasi Database**:
   - Edit `config/database.php` jika perlu mengubah kredensial database

## Pengembangan Selanjutnya

Fitur yang bisa ditambahkan:

- Upload gambar untuk setiap menu
- Editor WYSIWYG untuk konten
- Pencarian dan filter data
- Export data ke PDF/Excel
- Notifikasi email
- Gallery foto
- Berita dan pengumuman
- Sistem komentar

## Lisensi

© 2025 Desa Wukirsari. All rights reserved.

## Kontak

Untuk pertanyaan atau dukungan, hubungi:

- Email: info@wukirsari.desa.id
- Telepon: (0274) xxx-xxxx
