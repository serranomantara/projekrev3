<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pangripta - Web Desa Wukirsari</title>
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
            <h1><i class="fas fa-tools"></i> Pangripta</h1>
            <p>Pembangunan dan infrastruktur desa</p>
        </div>
    </section>
    <section class="page-content">
        <div class="container">
            <div class="submenu-section">
                <h2>Layanan Pangripta</h2>
                <div class="submenu-grid">
                    <div class="submenu-card">
                        <div class="submenu-icon">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        <h3>RPJM</h3>
                        <p>Rencana Pembangunan Jangka Menengah Desa</p>
                        <a href="pangripta_detail.php?menu=rpjm" class="btn-detail">
                            <i class="fas fa-eye"></i> Lihat Data
                        </a>
                    </div>

                    <div class="submenu-card">
                        <div class="submenu-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <h3>Profil Kalurahan</h3>
                        <p>Informasi profil dan data kalurahan</p>
                        <a href="pangripta_detail.php?menu=profil_kalurahan" class="btn-detail">
                            <i class="fas fa-eye"></i> Lihat Data
                        </a>
                    </div>

                    <div class="submenu-card">
                        <div class="submenu-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <h3>Publikasi Potensi Kalurahan</h3>
                        <p>Potensi dan keunggulan kalurahan</p>
                        <a href="pangripta_detail.php?menu=potensi_kalurahan" class="btn-detail">
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