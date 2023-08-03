<?php
include '../include/conn.php';

$id = $_POST['id'];
$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$genre = $_POST['genre'];
$stok = $_POST['stok'];

$query = "UPDATE books SET 
            judul = '$judul', 
            pengarang = '$pengarang', 
            genre = '$genre', 
            stok = $stok
            WHERE id = $id";

if (mysqli_query($conn, $query)) {
    echo '<script>alert("Data Buku Berhasil Diperbarui!"); window.location = "../listBooks.php";</script>';
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
$conn->close();
