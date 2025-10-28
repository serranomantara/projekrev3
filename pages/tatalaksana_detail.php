<?php
require_once '../config/database.php';

$menu = isset($_GET['menu']) ? $_GET['menu'] : '';

$menu_config = [
    'register_spp' => [
        'table' => 'register_spp_tatalaksana',
        'title' => 'Register Pengajuan SPP',
        'icon' => 'file-invoice',
        'columns' => ['nomor_spp', 'tanggal_pengajuan', 'bidang', 'uraian', 'jumlah', 'status']
    ],
    'jumlah_layanan' => [
        'table' => 'jumlah_layanan',
        'title' => 'Jumlah Layanan',
        'icon' => 'list-ol',
        'columns' => ['nama_layanan', 'jumlah_pemohon', 'bulan', 'tahun']
    ],
    'progres_adminduk' => [
        'table' => 'progres_layanan_adminduk',
        'title' => 'Progres Layanan Adminduk',
        'icon' => 'chart-line',
        'columns' => ['jenis_layanan', 'nama_pemohon', 'tanggal_pengajuan', 'status']
    ],
    'analisis_kependudukan' => [
        'table' => 'analisis_kependudukan',
        'title' => 'Analisis Data Kependudukan',
        'icon' => 'chart-bar',
        'columns' => ['judul_analisis', 'periode', 'jumlah_penduduk', 'jumlah_kk', 'laki_laki', 'perempuan']
    ],
    'penggunaan_ruangan' => [
        'table' => 'penggunaan_ruangan',
        'title' => 'Penggunaan Ruangan',
        'icon' => 'door-open',
        'columns' => ['nama_ruangan', 'nama_peminjam', 'tanggal_pinjam', 'waktu_mulai', 'waktu_selesai', 'keperluan', 'status']
    ]
];

if (!isset($menu_config[$menu])) {
    header('Location: tata_laksana.php');
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
            <p>Tata Laksana Desa Wukirsari</p>
        </div>
    </section>

    <section class="page-content">
        <div class="container">
            <div class="breadcrumb">
                <a href="../index.html"><i class="fas fa-home"></i> Beranda</a>
                <span>/</span>
                <a href="tata_laksana.php">Tata Laksana</a>
                <span>/</span>
                <span><?php echo $config['title']; ?></span>
            </div>

            <?php if (mysqli_num_rows($result) > 0): ?>
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
                            $no = 1;
                            while ($row = mysqli_fetch_assoc($result)):
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <?php foreach ($config['columns'] as $column): ?>
                                        <td>
                                            <?php
                                            if ($column == 'jumlah') {
                                                echo 'Rp ' . number_format($row[$column], 0, ',', '.');
                                            } elseif (strpos($column, 'tanggal') !== false) {
                                                echo date('d/m/Y', strtotime($row[$column]));
                                            } elseif (strpos($column, 'waktu') !== false && !strpos($column, 'tanggal')) {
                                                echo date('H:i', strtotime($row[$column]));
                                            } elseif ($column == 'status') {
                                                $status_class = [
                                                    'pending' => 'badge-warning',
                                                    'approved' => 'badge-success',
                                                    'rejected' => 'badge-danger',
                                                    'diajukan' => 'badge-warning',
                                                    'proses' => 'badge-info',
                                                    'selesai' => 'badge-success',
                                                    'ditolak' => 'badge-danger',
                                                    'disetujui' => 'badge-success'
                                                ];
                                                $class = isset($status_class[$row[$column]]) ? $status_class[$row[$column]] : 'badge-info';
                                                echo '<span class="badge ' . $class . '">' . ucfirst($row[$column]) . '</span>';
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
            <?php else: ?>
                <div class="empty-state">
                    <i class="fas fa-inbox"></i>
                    <h3>Belum Ada Data</h3>
                    <p>Data <?php echo strtolower($config['title']); ?> akan ditampilkan di sini</p>
                </div>
            <?php endif; ?>

            <div style="margin-top: 2rem; text-align: center;">
                <a href="tata_laksana.php" class="btn-detail">
                    <i class="fas fa-arrow-left"></i> Kembali ke Tata Laksana
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