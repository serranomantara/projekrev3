<?php
require_once '../config/database.php';

$query = "SELECT * FROM ppid_info WHERE id = 1";
$result = mysqli_query($conn, $query);
$ppid = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPID - Web Desa Wukirsari</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .ppid-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .ppid-card {
            background: white;
            border-radius: 12px;
            padding: 3rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        .ppid-header {
            text-align: center;
            margin-bottom: 3rem;
            padding-bottom: 2rem;
            border-bottom: 2px solid var(--primary-color);
        }

        .ppid-header h2 {
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .info-section {
            margin-bottom: 2rem;
        }

        .info-section h3 {
            color: var(--primary-color);
            margin-bottom: 1rem;
            font-size: 1.3rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-grid {
            display: grid;
            gap: 1.5rem;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 8px;
            border-left: 4px solid var(--primary-color);
        }

        .info-item i {
            color: var(--primary-color);
            font-size: 1.5rem;
            margin-top: 5px;
        }

        .info-content {
            flex: 1;
        }

        .info-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
            display: block;
        }

        .info-value {
            color: #666;
            line-height: 1.6;
        }

        .opening-hours {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 2rem;
            border-radius: 12px;
            margin-top: 2rem;
        }

        .opening-hours h3 {
            color: white;
            margin-bottom: 1rem;
        }

        .hours-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .hour-item {
            background: rgba(255, 255, 255, 0.1);
            padding: 1rem;
            border-radius: 8px;
            text-align: center;
        }

        .hour-item strong {
            display: block;
            margin-bottom: 5px;
        }
    </style>
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
            <h1><i class="fas fa-info-circle"></i> PPID</h1>
            <p>Pejabat Pengelola Informasi dan Dokumentasi Desa Wukirsari</p>
        </div>
    </section>

    <section class="page-content">
        <div class="container">
            <div class="breadcrumb">
                <a href="../index.html"><i class="fas fa-home"></i> Beranda</a>
                <span>/</span>
                <span>PPID</span>
            </div>

            <div class="ppid-container">
                <div class="ppid-card">
                    <div class="ppid-header">
                        <h2><?php echo htmlspecialchars($ppid['nama_pejabat'] ?? 'Pejabat PPID'); ?></h2>
                        <p><?php echo htmlspecialchars($ppid['jabatan'] ?? 'Pejabat Pengelola Informasi dan Dokumentasi'); ?>
                        </p>
                    </div>

                    <div class="info-section">
                        <h3><i class="fas fa-id-card"></i> Informasi Kontak</h3>
                        <div class="info-grid">
                            <div class="info-item">
                                <i class="fas fa-user"></i>
                                <div class="info-content">
                                    <span class="info-label">Nama Pejabat</span>
                                    <span
                                        class="info-value"><?php echo htmlspecialchars($ppid['nama_pejabat'] ?? '-'); ?></span>
                                </div>
                            </div>

                            <div class="info-item">
                                <i class="fas fa-briefcase"></i>
                                <div class="info-content">
                                    <span class="info-label">Jabatan</span>
                                    <span
                                        class="info-value"><?php echo htmlspecialchars($ppid['jabatan'] ?? '-'); ?></span>
                                </div>
                            </div>

                            <div class="info-item">
                                <i class="fas fa-phone"></i>
                                <div class="info-content">
                                    <span class="info-label">Telepon</span>
                                    <span
                                        class="info-value"><?php echo htmlspecialchars($ppid['telepon'] ?? '-'); ?></span>
                                </div>
                            </div>

                            <div class="info-item">
                                <i class="fas fa-envelope"></i>
                                <div class="info-content">
                                    <span class="info-label">Email</span>
                                    <span
                                        class="info-value"><?php echo htmlspecialchars($ppid['email'] ?? '-'); ?></span>
                                </div>
                            </div>

                            <div class="info-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <div class="info-content">
                                    <span class="info-label">Alamat Kantor</span>
                                    <span
                                        class="info-value"><?php echo htmlspecialchars($ppid['alamat'] ?? '-'); ?></span>
                                </div>
                            </div>

                            <div class="info-item">
                                <i class="fas fa-globe"></i>
                                <div class="info-content">
                                    <span class="info-label">Website</span>
                                    <span
                                        class="info-value"><?php echo htmlspecialchars($ppid['website'] ?? '-'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="opening-hours">
                        <h3><i class="fas fa-clock"></i> Jam Layanan</h3>
                        <div class="hours-list">
                            <div class="hour-item">
                                <strong>Senin - Kamis</strong>
                                <span><?php echo htmlspecialchars($ppid['jam_layanan_senin_kamis'] ?? '08:00 - 16:00'); ?></span>
                            </div>
                            <div class="hour-item">
                                <strong>Jumat</strong>
                                <span><?php echo htmlspecialchars($ppid['jam_layanan_jumat'] ?? '08:00 - 14:00'); ?></span>
                            </div>
                            <div class="hour-item">
                                <strong>Sabtu - Minggu</strong>
                                <span>Libur</span>
                            </div>
                        </div>
                    </div>

                    <?php if (!empty($ppid['deskripsi'])): ?>
                        <div class="info-section" style="margin-top: 2rem;">
                            <h3><i class="fas fa-info-circle"></i> Tentang PPID</h3>
                            <div class="info-value"
                                style="padding: 1rem; background: #f8f9fa; border-radius: 8px; line-height: 1.8;">
                                <?php echo nl2br(htmlspecialchars($ppid['deskripsi'])); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div
                        style="margin-top: 3rem; text-align: center; padding-top: 2rem; border-top: 1px solid #e5e7eb;">
                        <p style="color: #666; margin-bottom: 1rem;">
                            <i class="fas fa-question-circle"></i> Membutuhkan informasi atau dokumentasi?
                        </p>
                        <a href="mailto:<?php echo htmlspecialchars($ppid['email'] ?? ''); ?>" class="btn-detail">
                            <i class="fas fa-envelope"></i> Hubungi PPID
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