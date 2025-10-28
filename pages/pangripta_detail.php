<?php
require_once '../config/database.php';

$menu = isset($_GET['menu']) ? $_GET['menu'] : '';

$menu_config = [
    'rpjm' => [
        'table' => 'rpjm',
        'title' => 'RPJM',
        'icon' => 'clipboard-list',
        'columns' => ['tahun_mulai', 'tahun_selesai', 'judul_program', 'anggaran', 'status']
    ],
    'profil_kalurahan' => [
        'table' => 'profil_kalurahan',
        'title' => 'Profil Kalurahan',
        'icon' => 'building',
        'columns' => ['judul', 'kategori', 'isi']
    ],
    'potensi_kalurahan' => [
        'table' => 'potensi_kalurahan',
        'title' => 'Publikasi Potensi Kalurahan',
        'icon' => 'star',
        'columns' => ['judul', 'jenis_potensi', 'deskripsi', 'lokasi']
    ]
];

if (!isset($menu_config[$menu])) {
    header('Location: pangripta.php');
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
            <p>Pangripta Desa Wukirsari</p>
        </div>
    </section>

    <section class="page-content">
        <div class="container">
            <div class="breadcrumb">
                <a href="../index.html"><i class="fas fa-home"></i> Beranda</a>
                <span>/</span>
                <a href="pangripta.php">Pangripta</a>
                <span>/</span>
                <span><?php echo $config['title']; ?></span>
            </div>

            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php if ($menu == 'profil_kalurahan' || $menu == 'potensi_kalurahan'): ?>
                    <!-- Grid View untuk Profil dan Potensi -->
                    <div class="content-grid">
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <div class="content-card">
                                <?php if (isset($row['gambar']) && $row['gambar']): ?>
                                    <img src="../uploads/<?php echo htmlspecialchars($row['gambar']); ?>"
                                        alt="<?php echo htmlspecialchars($row['judul']); ?>"
                                        style="width: 100%; height: 200px; object-fit: cover;">
                                <?php else: ?>
                                    <div class="content-placeholder">
                                        <i class="fas fa-<?php echo $config['icon']; ?>"></i>
                                    </div>
                                <?php endif; ?>
                                <div class="content-body">
                                    <h3><?php echo htmlspecialchars($row['judul']); ?></h3>
                                    <?php if (isset($row['kategori'])): ?>
                                        <p><strong>Kategori:</strong> <?php echo htmlspecialchars($row['kategori']); ?></p>
                                    <?php endif; ?>
                                    <?php if (isset($row['jenis_potensi'])): ?>
                                        <p><strong>Jenis:</strong> <?php echo htmlspecialchars($row['jenis_potensi']); ?></p>
                                    <?php endif; ?>
                                    <?php if (isset($row['lokasi'])): ?>
                                        <p><i class="fas fa-map-marker-alt"></i> <?php echo htmlspecialchars($row['lokasi']); ?></p>
                                    <?php endif; ?>
                                    <p><?php echo substr(htmlspecialchars($row['deskripsi'] ?? $row['isi']), 0, 150) . '...'; ?></p>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php else: ?>
                    <!-- Table View untuk RPJM -->
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
                                                if ($column == 'anggaran') {
                                                    echo $row[$column] ? 'Rp ' . number_format($row[$column], 0, ',', '.') : '-';
                                                } elseif ($column == 'status') {
                                                    $status_class = [
                                                        'rencana' => 'badge-warning',
                                                        'berjalan' => 'badge-info',
                                                        'selesai' => 'badge-success'
                                                    ];
                                                    $class = isset($status_class[$row[$column]]) ? $status_class[$row[$column]] : 'badge-info';
                                                    echo '<span class="badge ' . $class . '">' . ucfirst($row[$column]) . '</span>';
                                                } elseif ($column == 'deskripsi' || $column == 'isi') {
                                                    echo substr(htmlspecialchars($row[$column]), 0, 100) . '...';
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
                <a href="pangripta.php" class="btn-detail">
                    <i class="fas fa-arrow-left"></i> Kembali ke Pangripta
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