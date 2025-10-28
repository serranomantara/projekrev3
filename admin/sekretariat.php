<?php
session_start();
require_once '../config/database.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: ../login.php');
    exit();
}

// Handle Add/Edit/Delete
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'add') {
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $description = mysqli_real_escape_string($conn, $_POST['description']);
            $content = mysqli_real_escape_string($conn, $_POST['content']);
            $created_by = $_SESSION['user_id'];

            $query = "INSERT INTO sekretariat (title, description, content, created_by) VALUES ('$title', '$description', '$content', $created_by)";
            mysqli_query($conn, $query);
            header('Location: sekretariat.php?success=1');
            exit();
        } elseif ($_POST['action'] == 'delete') {
            $id = (int) $_POST['id'];
            $query = "DELETE FROM sekretariat WHERE id = $id";
            mysqli_query($conn, $query);
            header('Location: sekretariat.php?deleted=1');
            exit();
        }
    }
}

// Get all data
$query = "SELECT s.*, u.name as creator FROM sekretariat s LEFT JOIN users u ON s.created_by = u.id ORDER BY s.created_at DESC";
$result = mysqli_query($conn, $query);

$user_name = $_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Sekretariat - Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="sidebar-header">
                <i class="fas fa-landmark"></i>
                <h3>Desa Wukirsari</h3>
            </div>

            <nav class="sidebar-nav">
                <a href="dashboard.php" class="nav-item">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
                <a href="sekretariat.php" class="nav-item active">
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

        <div class="main-content">
            <header class="topbar">
                <h1>Kelola Sekretariat</h1>
                <div class="user-info">
                    <i class="fas fa-user-circle"></i>
                    <span><?php echo htmlspecialchars($user_name); ?></span>
                </div>
            </header>

            <div class="content">
                <?php if (isset($_GET['success'])): ?>
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle"></i> Data berhasil ditambahkan!
                    </div>
                <?php endif; ?>

                <!-- Add Form -->
                <div class="form-container">
                    <h2><i class="fas fa-plus-circle"></i> Tambah Data Sekretariat</h2>
                    <form method="POST" action="">
                        <input type="hidden" name="action" value="add">
                        <div class="form-row">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" name="title" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Singkat</label>
                            <textarea name="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Konten Lengkap</label>
                            <textarea name="content" rows="6"></textarea>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Data Table -->
                <div class="table-container" style="margin-top: 2rem;">
                    <div class="table-header">
                        <h2><i class="fas fa-list"></i> Daftar Data Sekretariat</h2>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Dibuat Oleh</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($row = mysqli_fetch_assoc($result)):
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                                    <td><?php echo substr(htmlspecialchars($row['description']), 0, 100) . '...'; ?></td>
                                    <td><?php echo htmlspecialchars($row['creator'] ?? 'Unknown'); ?></td>
                                    <td><?php echo date('d/m/Y', strtotime($row['created_at'])); ?></td>
                                    <td>
                                        <div class="actions">
                                            <form method="POST" style="display: inline;"
                                                onsubmit="return confirm('Yakin ingin menghapus?')">
                                                <input type="hidden" name="action" value="delete">
                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>