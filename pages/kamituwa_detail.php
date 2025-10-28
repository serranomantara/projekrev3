<?php
require_once '../config/database.php';

$menu = isset($_GET['menu']) ? $_GET['menu'] : '';

$menu_config = [
    'profil_kebudayaan' => [
        'table' => 'profil_kebudayaan',
        'title' => 'Profil Kebudayaan',
        'icon' => 'landmark',
        'columns' => ['nama_budaya', 'kategori', 'deskripsi']
    ],
    'kegiatan_budaya' => [
        'table' => 'kegiatan_budaya',
        'title' => 'Daftar Kegiatan Budaya',
        'icon' => 'calendar-alt',
        'columns' => ['nama_kegiatan', 'tanggal', 'waktu', 'tempat', 'penyelenggara']
    ],
    'bantuan_sosial' => [
        'table' => 'bantuan_sosial',
        'title' => 'Bantuan Sosial',
        'icon' => 'hands-helping',
        'columns' => ['jenis_bantuan', 'nama_penerima', 'alamat', 'tanggal_penyerahan', 'nominal']
    ]
];

if (!isset($menu_config[$menu])) {
    header('Location: kamituwa.php');
    exit();
}

$config = $menu_config[$menu];
$query = "SELECT * FROM {$config['table']} ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $config['title']; ?> - Web Desa Wukirsari</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/page.css">
    <link rel="stylesheet" href="../assets/css/table.css">
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
            <h1><i class="fas fa-<?php echo $config['icon']; ?>"></i> <?php echo $config['title']; ?></h1>
            <p>Kamituwa Desa Wukirsari</p>
        </div>
    </section>

    <section class="page-content">
        <div class="container">
            <div class="breadcrumb">
                <a href="../index.html"><i class="fas fa-home"></i> Beranda</a>
                <span>/</span>
                <a href="kamituwa.php">Kamituwa</a>
                <span>/</span>
                <span><?php echo $config['title']; ?></span>
            </div>

            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php if ($menu == 'profil_kebudayaan' || $menu == 'kegiatan_budaya'): ?>
                    <!-- Grid View untuk Profil dan Kegiatan -->
                    <div class="content-grid">
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <div class="content-card">
                                <?php if (isset($row['gambar']) && $row['gambar']): ?>
                                    <img src="../uploads/<?php echo htmlspecialchars($row['gambar']); ?>"
                                        alt="<?php echo htmlspecialchars($row['nama_budaya'] ?? $row['nama_kegiatan']); ?>"
                                        style="width: 100%; height: 200px; object-fit: cover;">
                                <?php else: ?>
                                    <div class="content-placeholder">
                                        <i class="fas fa-<?php echo $config['icon']; ?>"></i>
                                    </div>
                                <?php endif; ?>
                                <div class="content-body">
                                    <h3><?php echo htmlspecialchars($row['nama_budaya'] ?? $row['nama_kegiatan']); ?></h3>
                                    <?php if (isset($row['kategori'])): ?>
                                        <p><span class="badge badge-info"><?php echo htmlspecialchars($row['kategori']); ?></span></p>
                                    <?php endif; ?>
                                    <?php if (isset($row['tanggal'])): ?>
                                        <p><i class="fas fa-calendar"></i> <?php echo date('d F Y', strtotime($row['tanggal'])); ?></p>
                                    <?php endif; ?>
                                    <?php if (isset($row['waktu'])): ?>
                                        <p><i class="fas fa-clock"></i> <?php echo date('H:i', strtotime($row['waktu'])); ?></p>
                                    <?php endif; ?>
                                    <?php if (isset($row['tempat'])): ?>
                                        <p><i class="fas fa-map-marker-alt"></i> <?php echo htmlspecialchars($row['tempat']); ?></p>
                                    <?php endif; ?>
                                    <?php if (isset($row['penyelenggara'])): ?>
                                        <p><strong>Penyelenggara:</strong> <?php echo htmlspecialchars($row['penyelenggara']); ?></p>
                                    <?php endif; ?>
                                    <?php if (isset($row['deskripsi'])): ?>
                                        <p><?php echo substr(htmlspecialchars($row['deskripsi']), 0, 150) . '...'; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php else: ?>
                    <!-- Table View untuk Bantuan Sosial -->
                    <div class="data-table-container">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <?php foreach ($config['columns'] as $column): ?>
                                        <th><?php echo ucwords(str_replace('_', ' ', $column)); ?></th>
                                    <?php endforeach; ?>
                                    <th>Tanggal Input</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                mysqli_data_seek($result, 0);
                                $no = 1;
                                while ($row = mysqli_fetch_assoc($result)):
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <?php foreach ($config['columns'] as $column): ?>
                                            <td>
                                                <?php
                                                if ($column == 'nominal') {
                                                    echo $row[$column] ? 'Rp ' . number_format($row[$column], 0, ',', '.') : '-';
                                                } elseif (strpos($column, 'tanggal') !== false) {
                                                    echo date('d/m/Y', strtotime($row[$column]));
                                                } elseif ($column == 'alamat' || $column == 'keterangan') {
                                                    echo isset($row[$column]) ? substr(htmlspecialchars($row[$column]), 0, 50) . '...' : '-';
                                                } else {
                                                    echo htmlspecialchars($row[$column]);
                                                }
                                                ?>
                                            </td>
                                        <?php endforeach; ?>
                                        <td><?php echo date('d/m/Y', strtotime($row['created_at'])); ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <div class="empty-state">
                    <i class="fas fa-inbox"></i>
                    <h3>Belum Ada Data</h3>
                    <p>Data <?php echo strtolower($config['title']); ?> akan ditampilkan di sini</p>
                </div>
            <?php endif; ?>

            <div style="margin-top: 2rem; text-align: center;">
                <a href="kamituwa.php" class="btn-detail">
                    <i class="fas fa-arrow-left"></i> Kembali ke Kamituwa
                </a>
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