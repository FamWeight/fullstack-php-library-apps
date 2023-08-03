<?php
include '../include/conn.php';

$id_transaksi = $_GET['id'];
$tanggal_pengembalian = date("Y-m-d");

// Ambil data peminjaman untuk memperoleh judul buku dan nama peminjam
$query = "SELECT * FROM transaction WHERE id = '$id_transaksi'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$judul_buku = $row["judul_buku"];
$nama_peminjam = $row["nama_peminjam"];

// Perbarui data transaksi
$update_query = "UPDATE transaction SET tanggal_pengembalian = '$tanggal_pengembalian', status_pengembalian = true WHERE id = '$id_transaksi'";

// Perbarui stok buku di tabel books
$stok_query = "UPDATE books SET stok = stok + 1 WHERE judul = '$judul_buku'";

// Execute the update queries
if (mysqli_query($conn, $update_query) && mysqli_query($conn, $stok_query)) {
    echo '<script>
    alert("Buku berhasil Dikembalikan!");
    window.location = "../dashboard.php";
</script>';
} else {
    echo "Error: " . mysqli_error($conn);
}
exit();
