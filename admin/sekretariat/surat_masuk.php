<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../../login.php');
    exit();
}

require_once '../../config/database.php';

// Handle Delete
if (isset($_GET['delete'])) {
    $id = mysqli_real_escape_string($conn, $_GET['delete']);
    $query = "DELETE FROM surat_masuk WHERE id = '$id'";
    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = "Data berhasil dihapus!";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Gagal menghapus data!";
        $_SESSION['message_type'] = "error";
    }
    header('Location: surat_masuk.php');
    exit();
}

// Handle Add/Edit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomor_surat = mysqli_real_escape_string($conn, $_POST['nomor_surat']);
    $tanggal_surat = mysqli_real_escape_string($conn, $_POST['tanggal_surat']);
    $tanggal_diterima = mysqli_real_escape_string($conn, $_POST['tanggal_diterima']);
    $pengirim = mysqli_real_escape_string($conn, $_POST['pengirim']);
    $perihal = mysqli_real_escape_string($conn, $_POST['perihal']);
    $sifat = mysqli_real_escape_string($conn, $_POST['sifat']);

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // Update
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $query = "UPDATE surat_masuk SET 
                  nomor_surat = '$nomor_surat',
                  tanggal_surat = '$tanggal_surat',
                  tanggal_diterima = '$tanggal_diterima',
                  pengirim = '$pengirim',
                  perihal = '$perihal',
                  sifat = '$sifat',
                  updated_at = CURRENT_TIMESTAMP
                  WHERE id = '$id'";
        $success_msg = "Data berhasil diperbarui!";
    } else {
        // Insert
        $query = "INSERT INTO surat_masuk (nomor_surat, tanggal_surat, tanggal_diterima, pengirim, perihal, sifat) 
                  VALUES ('$nomor_surat', '$tanggal_surat', '$tanggal_diterima', '$pengirim', '$perihal', '$sifat')";
        $success_msg = "Data berhasil ditambahkan!";
    }

    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = $success_msg;
        $_SESSION['message_type'] = "success";
        header('Location: surat_masuk.php');
        exit();
    } else {
        $error = mysqli_error($conn);
    }
}

// Get data for edit
$edit_data = null;
if (isset($_GET['edit'])) {
    $id = mysqli_real_escape_string($conn, $_GET['edit']);
    $result = mysqli_query($conn, "SELECT * FROM surat_masuk WHERE id = '$id'");
    $edit_data = mysqli_fetch_assoc($result);
}

// Get all data
$query = "SELECT * FROM surat_masuk ORDER BY tanggal_diterima DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Masuk - Admin Dashboard</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/dashboard.css">
    <link rel="stylesheet" href="../../assets/css/table.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #333;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 1rem;
        }

        .form-group textarea {
            min-height: 100px;
            resize: vertical;
        }

        .form-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn-primary,
        .btn-secondary {
            padding: 0.75rem 2rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background: var(--secondary-color);
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
        }

        .btn-edit,
        .btn-delete {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .btn-edit {
            background: #ffc107;
            color: #000;
        }

        .btn-delete {
            background: #dc3545;
            color: white;
        }

        .alert {
            padding: 1rem;
            border-radius: 6px;
            margin-bottom: 1rem;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        .modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            max-width: 600px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-header {
            margin-bottom: 1.5rem;
        }

        .modal-header h2 {
            color: var(--primary-color);
        }
    </style>
</head>

<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="sidebar-header">
                <i class="fas fa-landmark"></i>
                <span>Admin Panel</span>
            </div>
            <nav class="sidebar-nav">
                <a href="../dashboard.php"><i class="fas fa-home"></i> Dashboard</a>

                <div class="nav-section">Sekretariat</div>
                <a href="surat_masuk.php" class="active"><i class="fas fa-inbox"></i> Surat Masuk</a>
                <a href="surat_keluar.php"><i class="fas fa-paper-plane"></i> Surat Keluar</a>
                <a href="undangan_masuk.php"><i class="fas fa-envelope"></i> Undangan Masuk</a>
                <a href="undangan_keluar.php"><i class="fas fa-envelope-open"></i> Undangan Keluar</a>

                <div class="nav-section">Pengaturan</div>
                <a href="../users.php"><i class="fas fa-users"></i> Manajemen User</a>
                <a href="../../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </nav>
        </aside>

        <main class="main-content">
            <header class="content-header">
                <h1><i class="fas fa-inbox"></i> Surat Masuk</h1>
                <button class="btn-primary" onclick="openModal()">
                    <i class="fas fa-plus"></i> Tambah Surat Masuk
                </button>
            </header>

            <?php if (isset($_SESSION['message'])): ?>
                <div class="alert alert-<?php echo $_SESSION['message_type']; ?>">
                    <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    unset($_SESSION['message_type']);
                    ?>
                </div>
            <?php endif; ?>

            <?php if (isset($error)): ?>
                <div class="alert alert-error"><?php echo $error; ?></div>
            <?php endif; ?>

            <div class="content-card">
                <div class="data-table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Surat</th>
                                <th>Tanggal Surat</th>
                                <th>Tanggal Diterima</th>
                                <th>Pengirim</th>
                                <th>Perihal</th>
                                <th>Sifat</th>
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
                                    <td><?php echo htmlspecialchars($row['nomor_surat']); ?></td>
                                    <td><?php echo date('d/m/Y', strtotime($row['tanggal_surat'])); ?></td>
                                    <td><?php echo date('d/m/Y', strtotime($row['tanggal_diterima'])); ?></td>
                                    <td><?php echo htmlspecialchars($row['pengirim']); ?></td>
                                    <td><?php echo htmlspecialchars($row['perihal']); ?></td>
                                    <td>
                                        <?php
                                        $sifat_class = [
                                            'biasa' => 'badge-info',
                                            'penting' => 'badge-warning',
                                            'segera' => 'badge-danger'
                                        ];
                                        $class = $sifat_class[$row['sifat']] ?? 'badge-info';
                                        ?>
                                        <span class="badge <?php echo $class; ?>">
                                            <?php echo ucfirst($row['sifat']); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <button class="btn-edit" onclick='editData(<?php echo json_encode($row); ?>)'>
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <button class="btn-delete" onclick="confirmDelete(<?php echo $row['id']; ?>)">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <!-- Modal Form -->
    <div id="formModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="modalTitle">Tambah Surat Masuk</h2>
            </div>
            <form method="POST">
                <input type="hidden" name="id" id="editId">

                <div class="form-group">
                    <label for="nomor_surat">Nomor Surat *</label>
                    <input type="text" id="nomor_surat" name="nomor_surat" required>
                </div>

                <div class="form-group">
                    <label for="tanggal_surat">Tanggal Surat *</label>
                    <input type="date" id="tanggal_surat" name="tanggal_surat" required>
                </div>

                <div class="form-group">
                    <label for="tanggal_diterima">Tanggal Diterima *</label>
                    <input type="date" id="tanggal_diterima" name="tanggal_diterima" required>
                </div>

                <div class="form-group">
                    <label for="pengirim">Pengirim *</label>
                    <input type="text" id="pengirim" name="pengirim" required>
                </div>

                <div class="form-group">
                    <label for="perihal">Perihal *</label>
                    <textarea id="perihal" name="perihal" required></textarea>
                </div>

                <div class="form-group">
                    <label for="sifat">Sifat Surat *</label>
                    <select id="sifat" name="sifat" required>
                        <option value="">-- Pilih Sifat --</option>
                        <option value="biasa">Biasa</option>
                        <option value="penting">Penting</option>
                        <option value="segera">Segera</option>
                    </select>
                </div>

                <div class="form-buttons">
                    <button type="submit" class="btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <button type="button" class="btn-secondary" onclick="closeModal()">
                        <i class="fas fa-times"></i> Batal
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('formModal').classList.add('active');
            document.getElementById('modalTitle').textContent = 'Tambah Surat Masuk';
            document.querySelector('form').reset();
            document.getElementById('editId').value = '';
        }

        function closeModal() {
            document.getElementById('formModal').classList.remove('active');
        }

        function editData(data) {
            document.getElementById('formModal').classList.add('active');
            document.getElementById('modalTitle').textContent = 'Edit Surat Masuk';
            document.getElementById('editId').value = data.id;
            document.getElementById('nomor_surat').value = data.nomor_surat;
            document.getElementById('tanggal_surat').value = data.tanggal_surat;
            document.getElementById('tanggal_diterima').value = data.tanggal_diterima;
            document.getElementById('pengirim').value = data.pengirim;
            document.getElementById('perihal').value = data.perihal;
            document.getElementById('sifat').value = data.sifat;
        }

        function confirmDelete(id) {
            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                window.location.href = '?delete=' + id;
            }
        }

        // Close modal when clicking outside
        document.getElementById('formModal').addEventListener('click', function (e) {
            if (e.target === this) {
                closeModal();
            }
        });
    </script>
</body>

</html>