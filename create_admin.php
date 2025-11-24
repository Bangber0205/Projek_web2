<?php
// Script untuk membuat user admin dengan password yang benar

$password = 'admin123';
$hash = password_hash($password, PASSWORD_DEFAULT);

echo "Copy hash ini dan jalankan query di phpMyAdmin:\n\n";
echo "UPDATE users SET password_hash = '$hash', active = 1 WHERE username = 'admin';\n\n";
echo "Atau jika belum ada user, jalankan:\n\n";
echo "INSERT INTO users (email, username, password_hash, active, created_at) VALUES ('admin@warungkita.com', 'admin', '$hash', 1, NOW());\n\n";
echo "Login dengan:\n";
echo "Username: admin\n";
echo "Password: admin123\n";
?>
