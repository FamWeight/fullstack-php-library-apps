<?php include 'include/pageAuth.php' ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Aja - Dashboard</title>
    <meta name="description" content="Halaman Beranda Pengguna">
    <meta name="author" content="Wahyu Tri Novianto">
    <link rel="stylesheet" href="include/css/bootstrap.min.css">
</head>

<body>
    <?php include 'include/navbar.php' ?>

    <div class="container mt-5">
        <h1>Buku Yang Dipinjam</h1>
        <div class="table-responsive">
            <table class="table table-bordered table-striped-columns text-center">
                <thead>
                    <tr>
                        <th>ID</th>
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
                    $username = $_SESSION['username'];

                    $query = "SELECT * FROM transaction WHERE nama_peminjam = (
                    SELECT nama FROM users WHERE username = '$username'
                    ) AND status_pengembalian = false";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td class='text-nowrap'>" . $row["id"] . "</td>";
                            echo "<td class='text-nowrap'>" . $row["judul_buku"] . "</td>";
                            echo "<td class='text-nowrap'>" . $row["tanggal_meminjam"] . "</td>";
                            echo "<td class='text-nowrap'>";
                            if (empty($row["tanggal_pengembalian"])) {
                                echo "Belum dikembalikan";
                            } else {
                                echo $row["tanggal_pengembalian"];
                            }
                            echo "</td>";
                            echo "<td class='text-nowrap'>" . ($row["status_pengembalian"] ? "Sudah Dikembalikan" : "Belum Dikembalikan") . "</td>";
                            echo "<td class='text-nowrap'>";
                            if (!$row["status_pengembalian"]) {
                                echo '<a class="btn btn-outline-primary" href="proses/returnBook.php?id=' . $row['id'] . '"onclick="return confirm(\'Apakah Anda yakin ingin mengembalikan buku?\')">Kembalikan</a>';
                            }
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>Tidak ada data peminjaman buku.</td></tr>";
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