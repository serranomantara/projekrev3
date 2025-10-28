<?php
require_once '../config/database.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tata Laksana - Web Desa Wukirsari</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="logo"><i class="fas fa-landmark"></i><span>Desa Wukirsari</span></div>
                <nav class="nav">
                    <ul>
                        <li><a href="../index.html">Beranda</a></li>
                        <li><a href="../index.html#tentang">Tentang</a></li>
                        <li><a href="../index.html#layanan">Layanan</a></li>
                        <li><a href="../index.html#kontak">Kontak</a></li>
                    </ul>
                </nav>
                <div class="header-actions"><a href="../login.php" class="btn-login"><i class="fas fa-sign-in-alt"></i>
                        Login</a></div>
            </div>
        </div>
    </header>
    <section class="page-header">
        <div class="container">
            <h1><i class="fas fa-tasks"></i> Tata Laksana</h1>
            <p>Pengelolaan dan tata kelola pemerintahan desa</p>
        </div>
    </section>
    <section class="page-content">
        <div class="container">
            <div class="submenu-section">
                <h2 class="section-title">Layanan Tata Laksana</h2>
                <div class="content-grid">
                    <div class="content-card">
                        <div class="content-placeholder"><i class="fas fa-file-invoice"></i></div>
                        <div class="content-body">
                            <h3>Register Pengajuan SPP</h3>
                            <p>Daftar register pengajuan SPP tata laksana</p>
                            <a href="tatalaksana_detail.php?menu=register_spp" class="btn-detail"><i
                                    class="fas fa-eye"></i> Lihat Detail</a>
                        </div>
                    </div>
                    <div class="content-card">
                        <div class="content-placeholder"><i class="fas fa-list-ol"></i></div>
                        <div class="content-body">
                            <h3>Jumlah Layanan</h3>
                            <p>Data jumlah layanan yang tersedia</p>
                            <a href="tatalaksana_detail.php?menu=jumlah_layanan" class="btn-detail"><i
                                    class="fas fa-eye"></i> Lihat Detail</a>
                        </div>
                    </div>
                    <div class="content-card">
                        <div class="content-placeholder"><i class="fas fa-chart-line"></i></div>
                        <div class="content-body">
                            <h3>Progres Layanan Adminduk</h3>
                            <p>Monitoring progres layanan administrasi kependudukan</p>
                            <a href="tatalaksana_detail.php?menu=progres_adminduk" class="btn-detail"><i
                                    class="fas fa-eye"></i> Lihat Detail</a>
                        </div>
                    </div>
                    <div class="content-card">
                        <div class="content-placeholder"><i class="fas fa-chart-bar"></i></div>
                        <div class="content-body">
                            <h3>Analisis Data Kependudukan</h3>
                            <p>Analisis dan statistik data kependudukan</p>
                            <a href="tatalaksana_detail.php?menu=analisis_kependudukan" class="btn-detail"><i
                                    class="fas fa-eye"></i> Lihat Detail</a>
                        </div>
                    </div>
                    <div class="content-card">
                        <div class="content-placeholder"><i class="fas fa-door-open"></i></div>
                        <div class="content-body">
                            <h3>Penggunaan Ruangan</h3>
                            <p>Peminjaman dan penggunaan ruangan desa</p>
                            <a href="tatalaksana_detail.php?menu=penggunaan_ruangan" class="btn-detail"><i
                                    class="fas fa-eye"></i> Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer">
        <div class="container">
            <div class="footer-bottom">
                <p>&copy; 2025 Desa Wukirsari. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>