<?php
require_once '../config/database.php';

$menu = isset($_GET['menu']) ? $_GET['menu'] : '';

$menu_config = [
    'keamanan_lingkungan' => [
        'table' => 'keamanan_lingkungan',
        'title' => 'Keamanan Lingkungan',
        'icon' => 'shield-alt',
        'columns' => ['judul', 'lokasi', 'tanggal', 'status', 'tindakan']
    ],
    'siskamling' => [
        'table' => 'siskamling',
        'title' => 'Siskamling',
        'icon' => 'user-shield',
        'columns' => ['tanggal', 'pos', 'petugas', 'waktu_mulai', 'waktu_selesai', 'kondisi']
    ],
    'laporan_kejadian' => [
        'table' => 'laporan_kejadian',
        'title' => 'Laporan Kejadian',
        'icon' => 'exclamation-triangle',
        'columns' => ['tanggal_kejadian', 'waktu_kejadian', 'jenis_kejadian', 'lokasi', 'pelapor', 'status']
    ]
];

if (!isset($menu_config[$menu])) {
    header('Location: jagabaya.php');
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
            <p>Jagabaya Desa Wukirsari</p>
        </div>
    </section>

    <section class="page-content">
        <div class="container">
            <div class="breadcrumb">
                <a href="../index.html"><i class="fas fa-home"></i> Beranda</a>
                <span>/</span>
                <a href="jagabaya.php">Jagabaya</a>
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
                                            if (strpos($column, 'tanggal') !== false) {
                                                echo date('d/m/Y', strtotime($row[$column]));
                                            } elseif (strpos($column, 'waktu') !== false && !strpos($column, 'tanggal')) {
                                                echo date('H:i', strtotime($row[$column]));
                                            } elseif ($column == 'status') {
                                                $status_class = [
                                                    'aman' => 'badge-success',
                                                    'rawan' => 'badge-warning',
                                                    'bahaya' => 'badge-danger',
                                                    'dilaporkan' => 'badge-warning',
                                                    'ditindaklanjuti' => 'badge-info',
                                                    'selesai' => 'badge-success'
                                                ];
                                                $class = isset($status_class[$row[$column]]) ? $status_class[$row[$column]] : 'badge-info';
                                                echo '<span class="badge ' . $class . '">' . ucfirst($row[$column]) . '</span>';
                                            } elseif ($column == 'kondisi') {
                                                $kondisi_class = [
                                                    'normal' => 'badge-success',
                                                    'ada_kejadian' => 'badge-danger'
                                                ];
                                                $class = isset($kondisi_class[$row[$column]]) ? $kondisi_class[$row[$column]] : 'badge-info';
                                                echo '<span class="badge ' . $class . '">' . ucwords(str_replace('_', ' ', $row[$column])) . '</span>';
                                            } elseif ($column == 'tindakan' || $column == 'kronologi') {
                                                echo substr(htmlspecialchars($row[$column]), 0, 50) . '...';
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
                <a href="jagabaya.php" class="btn-detail">
                    <i class="fas fa-arrow-left"></i> Kembali ke Jagabaya
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