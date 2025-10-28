# Update Web Desa Wukirsari dengan Submenu

## Perubahan Terbaru

Website sekarang memiliki submenu detail untuk setiap menu utama:

### 1. **SEKRETARIAT** (9 submenu):

- Surat Masuk
- Surat Keluar
- Undangan Masuk
- Undangan Keluar
- Register Peraturan Kalurahan
- Register Peraturan Lurah
- Register Surat Putusan Lurah
- Register Lembaran Berita Kalurahan
- Pengajuan SPP

### 2. **TATA LAKSANA** (5 submenu):

- Register Pengajuan SPP
- Jumlah Layanan
- Progres Layanan Adminduk
- Analisis Data Kependudukan
- Penggunaan Ruangan

### 3. **DANARTA** (1 submenu):

- Register Pencairan SPP

### 4. **PANGRIPTA** (3 submenu):

- RPJM (Rencana Pembangunan Jangka Menengah)
- Profil Kalurahan
- Publikasi Potensi Kalurahan Wukirsari

### 5. **JAGABAYA** (3 submenu):

- Keamanan Lingkungan
- Siskamling
- Laporan Kejadian

### 6. **ULU-ULU** (3 submenu):

- Program Pembangunan Infrastruktur
- Pemberdayaan Masyarakat
- Pelatihan dan Workshop

### 7. **KAMITUWA** (3 submenu):

- Profil Kebudayaan
- Daftar Kegiatan Budaya
- Bantuan Sosial

### 8. **PPID** (Informasi Kontak):

- Alamat Kantor
- Nomor Telepon
- Email Resmi
- Media Sosial

## Cara Update Database

### Opsi 1: Import Database Baru (Recommended untuk Instalasi Baru)

1. **Backup database lama** (jika ada):

   - Buka phpMyAdmin
   - Pilih database `wukirsari_db`
   - Klik tab "Export"
   - Klik "Go" untuk download

2. **Drop database lama**:

   ```sql
   DROP DATABASE IF EXISTS wukirsari_db;
   ```

3. **Import database baru**:
   - Buka phpMyAdmin
   - Klik tab "Import"
   - Pilih file: `wukirsari_db_updated.sql`
   - Klik "Go"

### Opsi 2: Update Database yang Sudah Ada

Jika Anda sudah memiliki data di database lama dan ingin mempertahankannya:

1. Buka phpMyAdmin
2. Pilih database `wukirsari_db`
3. Klik tab "SQL"
4. Copy dan paste script SQL dari file `wukirsari_db_updated.sql` (bagian CREATE TABLE saja, skip DROP DATABASE dan INSERT users)
5. Klik "Go"

## File-File Baru yang Ditambahkan

### Frontend:

- `pages/sekretariat_detail.php` - Detail submenu sekretariat
- `pages/tatalaksana_detail.php` - Detail submenu tata laksana (perlu dibuat)
- `pages/danarta_detail.php` - Detail submenu danarta (perlu dibuat)
- `pages/pangripta_detail.php` - Detail submenu pangripta (perlu dibuat)
- `pages/jagabaya_detail.php` - Detail submenu jagabaya (perlu dibuat)
- `pages/uluulu_detail.php` - Detail submenu ulu-ulu (perlu dibuat)
- `pages/kamituwa_detail.php` - Detail submenu kamituwa (perlu dibuat)
- `pages/ppid_detail.php` - Detail informasi PPID (perlu dibuat)

### CSS:

- `assets/css/table.css` - Styling untuk tabel data

### Admin:

Untuk setiap submenu, perlu dibuat halaman admin untuk CRUD data.

## Struktur Database Baru

Database sekarang memiliki **32 tabel total**:

- 1 tabel users
- 9 tabel untuk Sekretariat
- 5 tabel untuk Tata Laksana
- 1 tabel untuk Danarta
- 3 tabel untuk Pangripta
- 3 tabel untuk Jagabaya
- 3 tabel untuk Ulu-Ulu
- 3 tabel untuk Kamituwa
- 1 tabel untuk PPID
- 1 tabel settings

## Testing

Setelah import database baru:

1. Login sebagai admin:

   - Username: admin
   - Password: admin123

2. Cek menu **Sekretariat**:

   - Klik menu Sekretariat di halaman utama
   - Akan muncul 9 card submenu
   - Klik salah satu submenu untuk melihat detail data

3. Data masih kosong karena baru diinstall, admin perlu input data dari dashboard

## Pengembangan Selanjutnya

Yang masih perlu diselesaikan:

1. ✅ Halaman detail untuk Sekretariat (sudah dibuat)
2. ⏳ Halaman detail untuk menu lainnya (Tata Laksana, Danarta, dst)
3. ⏳ Halaman admin CRUD untuk semua submenu
4. ⏳ Upload file untuk dokumen (PDF, gambar)
5. ⏳ Export data ke Excel/PDF
6. ⏳ Dashboard statistik per submenu

## Troubleshooting

### Error: Table doesn't exist

**Solusi**: Pastikan Anda sudah import database `wukirsari_db_updated.sql`

### Halaman submenu error 404

**Solusi**: Pastikan semua file detail page sudah dibuat dan ada di folder `pages/`

### Login gagal setelah update database

**Solusi**: Password default tetap sama:

- admin/admin123
- petugas/petugas123

## Kontak

Jika ada pertanyaan atau masalah, silakan hubungi developer atau buka issue di repository.

---

**Update**: 28 Oktober 2025
