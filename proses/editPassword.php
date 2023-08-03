<?php
include '../include/pageAuth.php';
// Mengambil data dari form ganti password
$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];

// Validasi bahwa password baru dan konfirmasi password sesuai
if ($new_password !== $confirm_password) {
    echo "Password baru dan konfirmasi password tidak sesuai.";
    exit();
}

// Memverifikasi password lama pengguna sebelum mengganti password
include '../include/conn.php';
$username = $_SESSION['username'];
$query = "SELECT password FROM users WHERE username = '$username'";
$result = $conn->query($query);

if ($result && $result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $hashed_password = $row['password'];

    // Memeriksa apakah password lama yang dimasukkan sesuai dengan password yang ada di database
    if (password_verify($old_password, $hashed_password)) {
        // Password lama sesuai, maka lakukan perubahan password
        $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
        $update_query = "UPDATE users SET password = '$hashed_new_password' WHERE username = '$username'";

        if ($conn->query($update_query) === TRUE) {
            echo '<script>alert("Ganti Password Berhasil!"); window.location = "../profile.php";</script>';
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo '<script>alert("Password Lama Salah!"); window.location = "../changePassword.php";</script>';
    }
} else {
    echo "Error: Pengguna tidak ditemukan.";
}

$conn->close();
