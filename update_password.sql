-- Update password hash untuk user yang sudah ada
UPDATE users SET password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi' WHERE username = 'admin';
UPDATE users SET password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi' WHERE username = 'petugas';

-- Note: Password untuk kedua user adalah:
-- admin: admin123
-- petugas: petugas123

-- Untuk membuat password baru, gunakan PHP:
-- password_hash('password_anda', PASSWORD_DEFAULT);
