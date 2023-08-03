<?php
// Memulai sesi
session_start();

// Konesikan
include '../include/conn.php';

// Mendapatkan data 
$id_buku = $_GET['id'];
$username = $_SESSION['username'];
$tanggal_peminjaman = date("Y-m-d");

// Dapatkan judul buku dari tabel "books"
$judul_query = "SELECT judul FROM books WHERE id = $id_buku";
$judul_result = $conn->query($judul_query);
if ($judul_result && $judul_result->num_rows === 1) {
    $row = $judul_result->fetch_assoc();
    $judul_buku = $row['judul'];
} else {
    echo "Error retrieving book title: " . mysqli_error($conn);
    exit();
}

// Memasukkan data peminjaman ke tabel transaction
$insert_query = "INSERT INTO transaction (judul_buku, nama_peminjam, tanggal_meminjam) VALUES (
    '$judul_buku',
    (SELECT nama FROM users WHERE username = '$username'),
    '$tanggal_peminjaman'
)";

// Penyesuaian stok di tabel books
if ($conn->query($insert_query) === TRUE) {
    // Kurangi stok buku di tabel "books"
    $update_stok_query = "UPDATE books SET stok = stok - 1 WHERE id = $id_buku";
    if ($conn->query($update_stok_query) !== TRUE) {
        echo "Error updating record: " . mysqli_error($conn);
    } else {
        // Redirect kembali ke halaman "availBooks.php" setelah melakukan peminjaman
        echo '<script>alert("Berhasil meminjam buku!"); window.location = "../availBooks.php";</script>';
        exit();
    }
} else {
    echo "Error inserting record: " . mysqli_error($conn);
}

// Menutup Koneksi
$conn->close();
