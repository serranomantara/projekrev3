<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sekretariat - Web Desa Wukirsari</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <!-- Header -->
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

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1><i class="fas fa-building"></i> Sekretariat</h1>
            <p>Informasi administrasi, surat menyurat, dan pelayanan umum desa</p>
        </div>
    </section>

    <!-- Content -->
    <section class="page-content">
        <div class="container">
            <!-- Submenu Cards -->
            <div class="submenu-section">
                <h2 class="section-title">Layanan Sekretariat</h2>
                <div class="content-grid">
                    <div class="content-card">
                        <div class="content-placeholder">
                            <i class="fas fa-inbox"></i>
                        </div>
                        <div class="content-body">
                            <h3>Surat Masuk</h3>
                            <p>Register dan arsip surat masuk desa</p>
                            <a href="sekretariat_detail.php?menu=surat_masuk" class="btn-detail">
                                <i class="fas fa-eye"></i> Lihat Detail
                            </a>
                        </div>
                    </div>

                    <div class="content-card">
                        <div class="content-placeholder">
                            <i class="fas fa-paper-plane"></i>
                        </div>
                        <div class="content-body">
                            <h3>Surat Keluar</h3>
                            <p>Register dan arsip surat keluar desa</p>
                            <a href="sekretariat_detail.php?menu=surat_keluar" class="btn-detail">
                                <i class="fas fa-eye"></i> Lihat Detail
                            </a>
                        </div>
                    </div>

                    <div class="content-card">
                        <div class="content-placeholder">
                            <i class="fas fa-envelope-open"></i>
                        </div>
                        <div class="content-body">
                            <h3>Undangan Masuk</h3>
                            <p>Daftar undangan yang diterima</p>
                            <a href="sekretariat_detail.php?menu=undangan_masuk" class="btn-detail">
                                <i class="fas fa-eye"></i> Lihat Detail
                            </a>
                        </div>
                    </div>

                    <div class="content-card">
                        <div class="content-placeholder">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="content-body">
                            <h3>Undangan Keluar</h3>
                            <p>Daftar undangan yang dikirim</p>
                            <a href="sekretariat_detail.php?menu=undangan_keluar" class="btn-detail">
                                <i class="fas fa-eye"></i> Lihat Detail
                            </a>
                        </div>
                    </div>

                    <div class="content-card">
                        <div class="content-placeholder">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="content-body">
                            <h3>Peraturan Kalurahan</h3>
                            <p>Register peraturan kalurahan</p>
                            <a href="sekretariat_detail.php?menu=peraturan_kalurahan" class="btn-detail">
                                <i class="fas fa-eye"></i> Lihat Detail
                            </a>
                        </div>
                    </div>

                    <div class="content-card">
                        <div class="content-placeholder">
                            <i class="fas fa-gavel"></i>
                        </div>
                        <div class="content-body">
                            <h3>Peraturan Lurah</h3>
                            <p>Register peraturan lurah</p>
                            <a href="sekretariat_detail.php?menu=peraturan_lurah" class="btn-detail">
                                <i class="fas fa-eye"></i> Lihat Detail
                            </a>
                        </div>
                    </div>

                    <div class="content-card">
                        <div class="content-placeholder">
                            <i class="fas fa-balance-scale"></i>
                        </div>
                        <div class="content-body">
                            <h3>Putusan Lurah</h3>
                            <p>Register surat putusan lurah</p>
                            <a href="sekretariat_detail.php?menu=putusan_lurah" class="btn-detail">
                                <i class="fas fa-eye"></i> Lihat Detail
                            </a>
                        </div>
                    </div>

                    <div class="content-card">
                        <div class="content-placeholder">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <div class="content-body">
                            <h3>Lembaran Berita</h3>
                            <p>Lembaran berita kalurahan</p>
                            <a href="sekretariat_detail.php?menu=lembaran_berita" class="btn-detail">
                                <i class="fas fa-eye"></i> Lihat Detail
                            </a>
                        </div>
                    </div>

                    <div class="content-card">
                        <div class="content-placeholder">
                            <i class="fas fa-file-invoice-dollar"></i>
                        </div>
                        <div class="content-body">
                            <h3>Pengajuan SPP</h3>
                            <p>Daftar pengajuan SPP sekretariat</p>
                            <a href="sekretariat_detail.php?menu=pengajuan_spp" class="btn-detail">
                                <i class="fas fa-eye"></i> Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Desa Wukirsari</h3>
                    <p>Portal informasi resmi Desa Wukirsari</p>
                </div>
                <div class="footer-section">
                    <h3>Link Cepat</h3>
                    <ul>
                        <li><a href="../index.html#layanan">Layanan</a></li>
                        <li><a href="../index.html#tentang">Tentang</a></li>
                        <li><a href="../index.html#kontak">Kontak</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Desa Wukirsari. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>