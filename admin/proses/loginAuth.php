<?php
include '../include/conn.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT password FROM admin WHERE username = '$username'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $hashedPassword = $row['password'];

    if (password_verify($password, $hashedPassword)) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'admin';
        $_SESSION['username'] = $username;

        setcookie('username', $username, time() + (86400 * 30), '/');

        echo '<script>alert("Login berhasil!"); window.location = "../aDashboard.php";</script>';
    } else {
        echo '<script>alert("Password salah!"); window.location = "../aLogin.php";</script>';
    }
} else {
    echo '<script>alert("Username salah!"); window.location = "../aLogin.php";</script>';
}
$conn->close();
