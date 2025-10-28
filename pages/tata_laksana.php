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
                <div class="logo">
                    <i class="fas fa-landmark"></i>
                    <span>Desa Wukirsari</span>
                </div>
                <nav class="nav">
                    <ul>
                        <li><a href="../index.html">Beranda</a></li>
                        <li><a href="../index.html#tentang">Tentang</a></li>
                        <li><a href="../index.html#layanan">Layanan</a></li>
                        <li><a href="../index.html#kontak">Kontak</a></li>
                    </ul>
                </nav>
                <div class="header-actions">
                    <a href="../login.php" class="btn-login">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                </div>
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
                <h2>Layanan Tata Laksana</h2>
                <div class="submenu-grid">
                    <div class="submenu-card">
                        <div class="submenu-icon">
                            <i class="fas fa-file-invoice"></i>
                        </div>
                        <h3>Register Pengajuan SPP</h3>
                        <p>Register pengajuan Surat Permintaan Pembayaran (SPP) dari berbagai bidang</p>
                        <a href="tatalaksana_detail.php?menu=register_spp" class="btn-detail">
                            <i class="fas fa-eye"></i> Lihat Data
                        </a>
                    </div>

                    <div class="submenu-card">
                        <div class="submenu-icon">
                            <i class="fas fa-list-ol"></i>
                        </div>
                        <h3>Jumlah Layanan</h3>
                        <p>Data jumlah pemohon untuk setiap jenis layanan per bulan</p>
                        <a href="tatalaksana_detail.php?menu=jumlah_layanan" class="btn-detail">
                            <i class="fas fa-eye"></i> Lihat Data
                        </a>
                    </div>

                    <div class="submenu-card">
                        <div class="submenu-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3>Progres Layanan Adminduk</h3>
                        <p>Monitoring progres layanan administrasi kependudukan</p>
                        <a href="tatalaksana_detail.php?menu=progres_adminduk" class="btn-detail">
                            <i class="fas fa-eye"></i> Lihat Data
                        </a>
                    </div>

                    <div class="submenu-card">
                        <div class="submenu-icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <h3>Analisis Data Kependudukan</h3>
                        <p>Analisis dan statistik data kependudukan desa</p>
                        <a href="tatalaksana_detail.php?menu=analisis_kependudukan" class="btn-detail">
                            <i class="fas fa-eye"></i> Lihat Data
                        </a>
                    </div>

                    <div class="submenu-card">
                        <div class="submenu-icon">
                            <i class="fas fa-door-open"></i>
                        </div>
                        <h3>Penggunaan Ruangan</h3>
                        <p>Jadwal dan data penggunaan ruangan/aula desa</p>
                        <a href="tatalaksana_detail.php?menu=penggunaan_ruangan" class="btn-detail">
                            <i class="fas fa-eye"></i> Lihat Data
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Desa Wukirsari</h3>
                    <p>Portal informasi resmi Desa Wukirsari</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Desa Wukirsari. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>