<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ulu-Ulu - Web Desa Wukirsari</title>
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
            <h1><i class="fas fa-water"></i> Ulu-Ulu</h1>
            <p>Pengelolaan irigasi dan pengairan desa</p>
        </div>
    </section>
    <section class="page-content">
        <div class="container">
            <div class="submenu-section">
                <h2>Layanan Ulu-Ulu</h2>
                <div class="submenu-grid">
                    <div class="submenu-card">
                        <div class="submenu-icon">
                            <i class="fas fa-hard-hat"></i>
                        </div>
                        <h3>Program Pembangunan Infrastruktur</h3>
                        <p>Daftar program pembangunan infrastruktur desa</p>
                        <a href="uluulu_detail.php?menu=program_infrastruktur" class="btn-detail">
                            <i class="fas fa-eye"></i> Lihat Data
                        </a>
                    </div>

                    <div class="submenu-card">
                        <div class="submenu-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>Pemberdayaan Masyarakat</h3>
                        <p>Program pemberdayaan dan pengembangan masyarakat</p>
                        <a href="uluulu_detail.php?menu=pemberdayaan_masyarakat" class="btn-detail">
                            <i class="fas fa-eye"></i> Lihat Data
                        </a>
                    </div>

                    <div class="submenu-card">
                        <div class="submenu-icon">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <h3>Pelatihan dan Workshop</h3>
                        <p>Daftar pelatihan dan workshop untuk masyarakat</p>
                        <a href="uluulu_detail.php?menu=pelatihan_workshop" class="btn-detail">
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