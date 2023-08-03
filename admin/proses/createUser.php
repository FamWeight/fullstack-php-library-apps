<?php
include '../include/conn.php';

$nama = $_POST['nama'];
$jenisKelamin = $_POST['jenisKelamin'];
$username = $_POST['username'];
$pekerjaan = $_POST['pekerjaan'];
$noHP = $_POST['noHP'];
$alamat = $_POST['alamat'];

$query = "SELECT * FROM users WHERE nama = '$nama' OR username = '$username'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo '<script>alert("Nama atau Username sudah ada di database!"); window.location = "../addUsers.php";</script>';
} else {
    $password = password_hash($username, PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (nama, jenis_kelamin, username, password, pekerjaan, no_hp, alamat)
            VALUES ('$nama', '$jenisKelamin', '$username', '$password', '$pekerjaan', '$noHP', '$alamat')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data Berhasil Ditambahkan!"); window.location = "../listUsers.php";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
$conn->close();
