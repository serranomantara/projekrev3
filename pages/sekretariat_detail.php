<?php
require_once '../config/database.php';

$menu = isset($_GET['menu']) ? $_GET['menu'] : '';

$menu_config = [
    'surat_masuk' => [
        'table' => 'surat_masuk',
        'title' => 'Surat Masuk',
        'icon' => 'inbox',
        'columns' => ['nomor_surat', 'tanggal_surat', 'pengirim', 'perihal']
    ],
    'surat_keluar' => [
        'table' => 'surat_keluar',
        'title' => 'Surat Keluar',
        'icon' => 'paper-plane',
        'columns' => ['nomor_surat', 'tanggal_surat', 'tujuan', 'perihal']
    ],
    'undangan_masuk' => [
        'table' => 'undangan_masuk',
        'title' => 'Undangan Masuk',
        'icon' => 'envelope-open',
        'columns' => ['nomor_undangan', 'tanggal_undangan', 'pengirim', 'acara']
    ],
    'undangan_keluar' => [
        'table' => 'undangan_keluar',
        'title' => 'Undangan Keluar',
        'icon' => 'envelope',
        'columns' => ['nomor_undangan', 'tanggal_undangan', 'tujuan', 'acara']
    ],
    'peraturan_kalurahan' => [
        'table' => 'peraturan_kalurahan',
        'title' => 'Register Peraturan Kalurahan',
        'icon' => 'book',
        'columns' => ['nomor_peraturan', 'tanggal', 'tentang']
    ],
    'peraturan_lurah' => [
        'table' => 'peraturan_lurah',
        'title' => 'Register Peraturan Lurah',
        'icon' => 'gavel',
        'columns' => ['nomor_peraturan', 'tanggal', 'tentang']
    ],
    'putusan_lurah' => [
        'table' => 'putusan_lurah',
        'title' => 'Register Surat Putusan Lurah',
        'icon' => 'balance-scale',
        'columns' => ['nomor_putusan', 'tanggal', 'tentang']
    ],
    'lembaran_berita' => [
        'table' => 'lembaran_berita',
        'title' => 'Lembaran Berita Kalurahan',
        'icon' => 'newspaper',
        'columns' => ['nomor', 'tanggal', 'judul']
    ],
    'pengajuan_spp' => [
        'table' => 'pengajuan_spp_sekretariat',
        'title' => 'Pengajuan SPP',
        'icon' => 'file-invoice-dollar',
        'columns' => ['nomor_spp', 'tanggal_pengajuan', 'uraian', 'jumlah', 'status']
    ]
];

if (!isset($menu_config[$menu])) {
    header('Location: sekretariat.php');
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
            <p>Sekretariat Desa Wukirsari</p>
        </div>
    </section>

    <section class="page-content">
        <div class="container">
            <div class="breadcrumb">
                <a href="../index.html"><i class="fas fa-home"></i> Beranda</a>
                <span>/</span>
                <a href="sekretariat.php">Sekretariat</a>
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
                                            } elseif ($column == 'status') {
                                                $status_class = [
                                                    'diajukan' => 'badge-warning',
                                                    'disetujui' => 'badge-success',
                                                    'ditolak' => 'badge-danger',
                                                    'dicairkan' => 'badge-success'
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
                <a href="sekretariat.php" class="btn-detail">
                    <i class="fas fa-arrow-left"></i> Kembali ke Sekretariat
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