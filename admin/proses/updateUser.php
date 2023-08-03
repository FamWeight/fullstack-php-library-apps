<?php
include '../include/conn.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$jenisKelamin = $_POST['jenis_kelamin'];
$username = $_POST['username'];
$pekerjaan = $_POST['pekerjaan'];
$noHP = $_POST['no_hp'];
$alamat = $_POST['alamat'];
$password = password_hash($username, PASSWORD_BCRYPT);
$query = "UPDATE users SET 
            nama = '$nama', 
            jenis_kelamin = '$jenisKelamin', 
            username = '$username', 
            password = '$password',
            pekerjaan = '$pekerjaan', 
            no_hp = '$noHP', 
            alamat = '$alamat' 
            WHERE id = '$id'";
if (mysqli_query($conn, $query)) {
    echo '<script>alert("Data Berhasil Diperbarui!"); window.location = "../listUsers.php";</script>';
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
$conn->close();
