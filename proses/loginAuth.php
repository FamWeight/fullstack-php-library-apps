<?php
include '../include/conn.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT password FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $hashedPassword = $row['password'];

    if (password_verify($password, $hashedPassword)) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'user';

        setcookie('username', $username, time() + (86400 * 30), '/');

        echo '<script>alert("Login berhasil!"); window.location = "../dashboard.php";</script>';
    } else {
        echo '<script>alert("Username atau password salah!"); window.location = "../index.php";</script>';
    }
} else {
    echo '<script>alert("Username tidak dapat ditemukan!"); window.location = "../index.php";</script>';
}
$conn->close();
