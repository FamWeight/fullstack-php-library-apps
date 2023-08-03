<?php include 'include/pageAuth.php' ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Why Library</title>
    <meta name="description" content="Halaman yang menampilkan daftar transaksi di Why Library">
    <meta name="author" content="Wahyu Tri Novianto">
    <link rel="stylesheet" href="include/css/bootstrap.min.css">
</head>

<body>
    <?php include 'include/navbar.php' ?>

    <div class="container mt-5">
        <h1>Daftar Transaksi</h1>
        <div class="text-end mb-2">
            <a class="btn btn-primary" href="proses/printReport.php" target="_blank">Cetak Laporan</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped-columns text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Peminjam</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Meminjam</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Status Pengembalian</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'include/conn.php';
                    $query = "SELECT * FROM transaction";
                    $result = $conn->query($query);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td class='text-nowrap'>" . $row["id"] . "</td>";
                            echo "<td class='text-nowrap'>" . $row["nama_peminjam"] . "</td>";
                            echo "<td class='text-nowrap'>" . $row["judul_buku"] . "</td>";
                            echo "<td class='text-nowrap'>" . $row["tanggal_meminjam"] . "</td>";
                            echo "<td class='text-nowrap'>" . $row["tanggal_pengembalian"] . "</td>";
                            echo "<td class='text-nowrap'>" . ($row["status_pengembalian"] ? 'Sudah Dikembalikan' : 'Belum Dikembalikan') . "</td>";
                            echo "<td class='text-nowrap'>";
                            echo '<a class="btn btn-outline-danger" href="proses/deleteTransactions.php?id=' . $row['id'] . '" onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\')">Hapus</a>';
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>Tidak ada data transaksi.</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="include/js/logoutConfirm.js"></script>
    <script src="include/js/jquery.min.js"></script>
    <script src="include/js/bootstrap.bundle.min.js"></script>
</body>

</html>