<?php
include '../include/conn.php';

$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$genre = $_POST['genre'];
$stok = $_POST['stok'];

$query = "SELECT * FROM books WHERE judul = '$judul'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo '<script>alert("Buku dengan judul tersebut sudah ada di database!"); window.location = "../addBooks.php";</script>';
} else {
    $sql = "INSERT INTO books (judul, pengarang, genre, stok)
            VALUES ('$judul', '$pengarang', '$genre', $stok)";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data Buku Berhasil Ditambahkan!"); window.location = "../listBooks.php";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
$conn->close();
