<?php
session_start();
require_once '../config/database.php';

// Check if user is logged in and is admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: ../login.php');
    exit();
}

$user_name = $_SESSION['name'];

// Get statistics
$stats = [];
$tables = ['sekretariat', 'tata_laksana', 'danarta', 'pangripta', 'jagabaya', 'ulu_ulu', 'kamituwa', 'ppid'];
foreach ($tables as $table) {
    $query = "SELECT COUNT(*) as count FROM $table";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $stats[$table] = $row['count'];
}

// Get total users
$query = "SELECT COUNT(*) as count FROM users";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$total_users = $row['count'];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Web Desa Wukirsari</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <i class="fas fa-landmark"></i>
                <h3>Desa Wukirsari</h3>
            </div>

            <nav class="sidebar-nav">
                <a href="dashboard.php" class="nav-item active">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
                <a href="sekretariat.php" class="nav-item">
                    <i class="fas fa-building"></i>
                    <span>Sekretariat</span>
                </a>
                <a href="tata_laksana.php" class="nav-item">
                    <i class="fas fa-tasks"></i>
                    <span>Tata Laksana</span>
                </a>
                <a href="danarta.php" class="nav-item">
                    <i class="fas fa-wallet"></i>
                    <span>Danarta</span>
                </a>
                <a href="pangripta.php" class="nav-item">
                    <i class="fas fa-tools"></i>
                    <span>Pangripta</span>
                </a>
                <a href="jagabaya.php" class="nav-item">
                    <i class="fas fa-shield-alt"></i>
                    <span>Jagabaya</span>
                </a>
                <a href="ulu_ulu.php" class="nav-item">
                    <i class="fas fa-water"></i>
                    <span>Ulu-Ulu</span>
                </a>
                <a href="kamituwa.php" class="nav-item">
                    <i class="fas fa-users"></i>
                    <span>Kamituwa</span>
                </a>
                <a href="ppid.php" class="nav-item">
                    <i class="fas fa-file-alt"></i>
                    <span>PPID</span>
                </a>
                <a href="users.php" class="nav-item">
                    <i class="fas fa-user-shield"></i>
                    <span>Manajemen User</span>
                </a>
                <a href="logout.php" class="nav-item">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Top Bar -->
            <header class="topbar">
                <h1>Dashboard Administrator</h1>
                <div class="user-info">
                    <i class="fas fa-user-circle"></i>
                    <span>Selamat datang, <strong><?php echo htmlspecialchars($user_name); ?></strong></span>
                </div>
            </header>

            <!-- Content -->
            <div class="content">
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon blue">
                            <i class="fas fa-building"></i>
                        </div>
                        <div class="stat-info">
                            <h3><?php echo $stats['sekretariat']; ?></h3>
                            <p>Sekretariat</p>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon green">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <div class="stat-info">
                            <h3><?php echo $stats['tata_laksana']; ?></h3>
                            <p>Tata Laksana</p>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon orange">
                            <i class="fas fa-wallet"></i>
                        </div>
                        <div class="stat-info">
                            <h3><?php echo $stats['danarta']; ?></h3>
                            <p>Danarta</p>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon purple">
                            <i class="fas fa-tools"></i>
                        </div>
                        <div class="stat-info">
                            <h3><?php echo $stats['pangripta']; ?></h3>
                            <p>Pangripta</p>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon red">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div class="stat-info">
                            <h3><?php echo $stats['jagabaya']; ?></h3>
                            <p>Jagabaya</p>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon cyan">
                            <i class="fas fa-water"></i>
                        </div>
                        <div class="stat-info">
                            <h3><?php echo $stats['ulu_ulu']; ?></h3>
                            <p>Ulu-Ulu</p>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon indigo">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-info">
                            <h3><?php echo $stats['kamituwa']; ?></h3>
                            <p>Kamituwa</p>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon teal">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <div class="stat-info">
                            <h3><?php echo $stats['ppid']; ?></h3>
                            <p>PPID</p>
                        </div>
                    </div>
                </div>

                <div class="welcome-card">
                    <h2><i class="fas fa-info-circle"></i> Informasi Dashboard</h2>
                    <p>Selamat datang di dashboard administrator Web Desa Wukirsari. Dari sini Anda dapat mengelola
                        semua konten dan informasi yang ditampilkan pada website.</p>
                    <div class="info-list">
                        <div class="info-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Kelola 8 menu layanan utama</span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Manajemen pengguna (Admin & Petugas)</span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Total <?php echo $total_users; ?> pengguna terdaftar</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>