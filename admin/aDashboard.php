<?php
include 'include/pageAuth.php';
include 'include/conn.php';

// Mengambil jumlah pengguna
$queryUsers = "SELECT COUNT(*) AS total_users FROM users";
$resultUsers = mysqli_query($conn, $queryUsers);
$rowUsers = mysqli_fetch_assoc($resultUsers);
$totalUsers = $rowUsers['total_users'];

// Mengambil jumlah stok buku
$queryStok = "SELECT SUM(stok) AS total_stok FROM books";
$resultStok = mysqli_query($conn, $queryStok);
$rowStok = mysqli_fetch_assoc($resultStok);
$totalStok = $rowStok['total_stok'];

// Mengambil jumlah judul buku
$queryJudulBuku = "SELECT COUNT(*) AS total_judul_buku FROM books";
$resultJudulBuku = mysqli_query($conn, $queryJudulBuku);
$rowJudulBuku = mysqli_fetch_assoc($resultJudulBuku);
$totalJudulBuku = $rowJudulBuku['total_judul_buku'];

// Mengambil jumlah baris dengan status_pengembalian=false atau belum dikembalikan
$queryPengembalian = "SELECT COUNT(*) AS total_belum_dikembalikan FROM transaction WHERE status_pengembalian = false";
$resultPengembalian = mysqli_query($conn, $queryPengembalian);
$rowPengembalian = mysqli_fetch_assoc($resultPengembalian);
$totalBelumDikembalikan = $rowPengembalian['total_belum_dikembalikan'];

$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Why Library</title>
    <meta name="description" content="Halaman Beranda Administrator">
    <meta name="author" content="Wahyu Tri Novianto">
    <link rel="stylesheet" href="include/css/bootstrap.min.css">
</head>

<body>
    <?php include 'include/navbar.php' ?>

    <div class="container mt-5">
        <h1 class="mb-4">Beranda Admin</h1>
        <div class="row">
            <div class="col-lg-4">
                <div class="bg-light p-4 mb-4">
                    <h3>Jumlah Pengguna: <?php echo $totalUsers; ?></h3>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="bg-light p-4 mb-4">
                    <h3>Jumlah Judul Buku: <?php echo $totalJudulBuku; ?></h3>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="bg-light p-4 mb-4">
                    <h3>Jumlah Stok Buku : <?php echo $totalStok; ?></h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="bg-light p-4 mb-4">
                    <h3>Jumlah Buku Yang Belum Dikembalikan : <?php echo $totalBelumDikembalikan; ?></h3>
                </div>
            </div>
        </div>
    </div>

    <script src="include/js/logoutConfirm.js"></script>
    <script src="include/js/jquery.min.js"></script>
    <script src="include/js/bootstrap.bundle.min.js"></script>
</body>

</html>