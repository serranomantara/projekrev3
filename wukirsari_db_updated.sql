-- phpMyAdmin SQL Dump
-- Database: wukirsari_db (Updated Version with Submenus)
-- --------------------------------------------------------

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wukirsari_db`
--
CREATE DATABASE IF NOT EXISTS `wukirsari_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `wukirsari_db`;

-- --------------------------------------------------------
-- Table structure for table `users`
-- --------------------------------------------------------

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `role`, `created_at`) VALUES
(1, 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Administrator', 'admin@wukirsari.id', 'admin', NOW()),
(2, 'petugas', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Petugas Desa', 'petugas@wukirsari.id', 'user', NOW());

-- --------------------------------------------------------
-- SEKRETARIAT TABLES (9 submenu)
-- --------------------------------------------------------

-- Surat Masuk
CREATE TABLE `surat_masuk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_surat` varchar(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanggal_diterima` date NOT NULL,
  `pengirim` varchar(200) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `keterangan` text,
  `file_surat` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `surat_masuk_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Surat Keluar
CREATE TABLE `surat_keluar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_surat` varchar(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tujuan` varchar(200) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `keterangan` text,
  `file_surat` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `surat_keluar_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Undangan Masuk
CREATE TABLE `undangan_masuk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_undangan` varchar(100) NOT NULL,
  `tanggal_undangan` date NOT NULL,
  `pengirim` varchar(200) NOT NULL,
  `acara` varchar(255) NOT NULL,
  `tempat` varchar(200) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `keterangan` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `undangan_masuk_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Undangan Keluar
CREATE TABLE `undangan_keluar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_undangan` varchar(100) NOT NULL,
  `tanggal_undangan` date NOT NULL,
  `tujuan` varchar(200) NOT NULL,
  `acara` varchar(255) NOT NULL,
  `tempat` varchar(200) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `keterangan` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `undangan_keluar_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Register Peraturan Kalurahan
CREATE TABLE `peraturan_kalurahan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_peraturan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `tentang` varchar(255) NOT NULL,
  `keterangan` text,
  `file_dokumen` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `peraturan_kalurahan_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Register Peraturan Lurah
CREATE TABLE `peraturan_lurah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_peraturan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `tentang` varchar(255) NOT NULL,
  `keterangan` text,
  `file_dokumen` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `peraturan_lurah_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Register Surat Putusan Lurah
CREATE TABLE `putusan_lurah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_putusan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `tentang` varchar(255) NOT NULL,
  `keterangan` text,
  `file_dokumen` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `putusan_lurah_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Register Lembaran Berita Kalurahan
CREATE TABLE `lembaran_berita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text,
  `file_dokumen` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `lembaran_berita_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Pengajuan SPP (Sekretariat)
CREATE TABLE `pengajuan_spp_sekretariat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_spp` varchar(100) NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `uraian` varchar(255) NOT NULL,
  `jumlah` decimal(15,2) NOT NULL,
  `status` enum('diajukan','disetujui','ditolak','dicairkan') DEFAULT 'diajukan',
  `keterangan` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `pengajuan_spp_sekretariat_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- TATA LAKSANA TABLES (5 submenu)
-- --------------------------------------------------------

-- Register Pengajuan SPP (Tata Laksana)
CREATE TABLE `register_spp_tatalaksana` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_spp` varchar(100) NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `bidang` varchar(100) NOT NULL,
  `uraian` varchar(255) NOT NULL,
  `jumlah` decimal(15,2) NOT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `keterangan` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `register_spp_tatalaksana_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Jumlah Layanan
CREATE TABLE `jumlah_layanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_layanan` varchar(200) NOT NULL,
  `jumlah_pemohon` int(11) DEFAULT 0,
  `bulan` varchar(20) NOT NULL,
  `tahun` year NOT NULL,
  `keterangan` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `jumlah_layanan_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Progres Layanan Adminduk
CREATE TABLE `progres_layanan_adminduk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_layanan` varchar(200) NOT NULL,
  `nama_pemohon` varchar(200) NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `status` enum('diajukan','proses','selesai','ditolak') DEFAULT 'diajukan',
  `keterangan` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `progres_layanan_adminduk_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Analisis Data Kependudukan
CREATE TABLE `analisis_kependudukan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul_analisis` varchar(200) NOT NULL,
  `periode` varchar(50) NOT NULL,
  `jumlah_penduduk` int(11) DEFAULT NULL,
  `jumlah_kk` int(11) DEFAULT NULL,
  `laki_laki` int(11) DEFAULT NULL,
  `perempuan` int(11) DEFAULT NULL,
  `isi_analisis` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `analisis_kependudukan_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Penggunaan Ruangan
CREATE TABLE `penggunaan_ruangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_ruangan` varchar(100) NOT NULL,
  `nama_peminjam` varchar(200) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `status` enum('pending','disetujui','ditolak','selesai') DEFAULT 'pending',
  `keterangan` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `penggunaan_ruangan_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- DANARTA TABLES (1 submenu)
-- --------------------------------------------------------

-- Register Pencairan SPP
CREATE TABLE `pencairan_spp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_spp` varchar(100) NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `tanggal_pencairan` date DEFAULT NULL,
  `uraian` varchar(255) NOT NULL,
  `jumlah` decimal(15,2) NOT NULL,
  `status` enum('pending','dicairkan','ditolak') DEFAULT 'pending',
  `keterangan` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `pencairan_spp_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- PANGRIPTA TABLES (3 submenu)
-- --------------------------------------------------------

-- RPJM
CREATE TABLE `rpjm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun_mulai` year NOT NULL,
  `tahun_selesai` year NOT NULL,
  `judul_program` varchar(255) NOT NULL,
  `deskripsi` text,
  `anggaran` decimal(15,2) DEFAULT NULL,
  `status` enum('rencana','berjalan','selesai') DEFAULT 'rencana',
  `file_dokumen` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `rpjm_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Profil Kalurahan
CREATE TABLE `profil_kalurahan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) NOT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `profil_kalurahan_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Publikasi Potensi Kalurahan
CREATE TABLE `potensi_kalurahan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) NOT NULL,
  `jenis_potensi` varchar(100) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `lokasi` varchar(200) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `potensi_kalurahan_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- JAGABAYA TABLES (3 submenu)
-- --------------------------------------------------------

-- Keamanan Lingkungan
CREATE TABLE `keamanan_lingkungan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) NOT NULL,
  `lokasi` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` text,
  `status` enum('aman','rawan','bahaya') DEFAULT 'aman',
  `tindakan` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `keamanan_lingkungan_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Siskamling
CREATE TABLE `siskamling` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `pos` varchar(100) NOT NULL,
  `petugas` varchar(200) NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `kondisi` enum('normal','ada_kejadian') DEFAULT 'normal',
  `catatan` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `siskamling_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Laporan Kejadian
CREATE TABLE `laporan_kejadian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_kejadian` date NOT NULL,
  `waktu_kejadian` time NOT NULL,
  `jenis_kejadian` varchar(100) NOT NULL,
  `lokasi` varchar(200) NOT NULL,
  `kronologi` text NOT NULL,
  `pelapor` varchar(200) DEFAULT NULL,
  `tindakan` text,
  `status` enum('dilaporkan','ditindaklanjuti','selesai') DEFAULT 'dilaporkan',
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `laporan_kejadian_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- ULU-ULU TABLES (3 submenu)
-- --------------------------------------------------------

-- Program Pembangunan Infrastruktur
CREATE TABLE `program_infrastruktur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_program` varchar(200) NOT NULL,
  `lokasi` varchar(200) NOT NULL,
  `jenis_infrastruktur` varchar(100) DEFAULT NULL,
  `tahun` year NOT NULL,
  `anggaran` decimal(15,2) DEFAULT NULL,
  `progress` int(3) DEFAULT 0,
  `status` enum('rencana','berjalan','selesai','tertunda') DEFAULT 'rencana',
  `deskripsi` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `program_infrastruktur_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Pemberdayaan Masyarakat
CREATE TABLE `pemberdayaan_masyarakat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_program` varchar(200) NOT NULL,
  `tanggal_pelaksanaan` date NOT NULL,
  `lokasi` varchar(200) DEFAULT NULL,
  `jumlah_peserta` int(11) DEFAULT NULL,
  `deskripsi` text,
  `hasil` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `pemberdayaan_masyarakat_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Pelatihan dan Workshop
CREATE TABLE `pelatihan_workshop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) NOT NULL,
  `jenis` enum('pelatihan','workshop','seminar') NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `tempat` varchar(200) NOT NULL,
  `narasumber` varchar(200) DEFAULT NULL,
  `jumlah_peserta` int(11) DEFAULT NULL,
  `materi` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `pelatihan_workshop_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- KAMITUWA TABLES (3 submenu)
-- --------------------------------------------------------

-- Profil Kebudayaan
CREATE TABLE `profil_kebudayaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_budaya` varchar(200) NOT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `sejarah` text,
  `gambar` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `profil_kebudayaan_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Daftar Kegiatan Budaya
CREATE TABLE `kegiatan_budaya` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kegiatan` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `tempat` varchar(200) NOT NULL,
  `penyelenggara` varchar(200) DEFAULT NULL,
  `deskripsi` text,
  `gambar` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `kegiatan_budaya_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Bantuan Sosial
CREATE TABLE `bantuan_sosial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_bantuan` varchar(100) NOT NULL,
  `nama_penerima` varchar(200) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `tanggal_penyerahan` date NOT NULL,
  `nominal` decimal(15,2) DEFAULT NULL,
  `keterangan` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `bantuan_sosial_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- PPID TABLE (Contact Information)
-- --------------------------------------------------------

CREATE TABLE `ppid_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alamat_kantor` text NOT NULL,
  `nomor_telepon` varchar(50) NOT NULL,
  `email_resmi` varchar(100) NOT NULL,
  `facebook` varchar(200) DEFAULT NULL,
  `twitter` varchar(200) DEFAULT NULL,
  `instagram` varchar(200) DEFAULT NULL,
  `youtube` varchar(200) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `ppid_info` (`alamat_kantor`, `nomor_telepon`, `email_resmi`, `facebook`, `instagram`) VALUES
('Desa Wukirsari, Kecamatan ..., Kabupaten ...', '(0274) xxx-xxxx', 'ppid@wukirsari.desa.id', 'https://facebook.com/wukirsari', 'https://instagram.com/wukirsari');

-- --------------------------------------------------------
-- SETTINGS TABLE
-- --------------------------------------------------------

CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(100) NOT NULL,
  `setting_value` text DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting_key` (`setting_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `settings` (`setting_key`, `setting_value`) VALUES
('site_name', 'Web Desa Wukirsari'),
('site_tagline', 'Portal informasi resmi Desa Wukirsari. Temukan berbagai layanan, informasi, dan berita terkini tentang desa kami.'),
('site_address', 'Desa Wukirsari, Kecamatan ..., Kabupaten ...'),
('site_phone', '(0274) xxx-xxxx'),
('site_email', 'info@wukirsari.desa.id');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
