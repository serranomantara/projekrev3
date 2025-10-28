<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kamituwa - Web Desa Wukirsari</title>
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
            <h1><i class="fas fa-users"></i> Kamituwa</h1>
            <p>Musyawarah dan partisipasi masyarakat</p>
        </div>
    </section>
    <section class="page-content">
        <div class="container">
            <div class="submenu-section">
                <h2>Layanan Kamituwa</h2>
                <div class="submenu-grid">
                    <div class="submenu-card">
                        <div class="submenu-icon">
                            <i class="fas fa-landmark"></i>
                        </div>
                        <h3>Profil Kebudayaan</h3>
                        <p>Informasi profil dan warisan budaya desa</p>
                        <a href="kamituwa_detail.php?menu=profil_kebudayaan" class="btn-detail">
                            <i class="fas fa-eye"></i> Lihat Data
                        </a>
                    </div>

                    <div class="submenu-card">
                        <div class="submenu-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <h3>Daftar Kegiatan Budaya</h3>
                        <p>Jadwal dan informasi kegiatan budaya desa</p>
                        <a href="kamituwa_detail.php?menu=kegiatan_budaya" class="btn-detail">
                            <i class="fas fa-eye"></i> Lihat Data
                        </a>
                    </div>

                    <div class="submenu-card">
                        <div class="submenu-icon">
                            <i class="fas fa-hands-helping"></i>
                        </div>
                        <h3>Bantuan Sosial</h3>
                        <p>Data penyaluran bantuan sosial kepada masyarakat</p>
                        <a href="kamituwa_detail.php?menu=bantuan_sosial" class="btn-detail">
                            <i class="fas fa-eye"></i> Lihat Data
                        </a>
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