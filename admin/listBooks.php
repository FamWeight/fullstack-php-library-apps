<?php include 'include/pageAuth.php' ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Why Library</title>
    <meta name="description" content="Halaman yang menampilkan daftar buku di Why Library">
    <meta name="author" content="Wahyu Tri Novianto">
    <link rel="stylesheet" href="include/css/bootstrap.min.css">
</head>

<body>
    <?php include 'include/navbar.php' ?>

    <div class="container mt-5">
        <h1>Daftar Buku</h1>
        <div class="table-responsive">
            <table class="table table-bordered table-striped-columns text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Judul</th>
                        <th>Pengarang</th>
                        <th>Genre</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'include/conn.php';
                    $query = "SELECT * FROM books";
                    $result = $conn->query($query);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td class='text-nowrap'>" . $row["id"] . "</td>";
                            echo "<td class='text-nowrap'>" . $row["judul"] . "</td>";
                            echo "<td class='text-nowrap'>" . $row["pengarang"] . "</td>";
                            echo "<td class='text-nowrap'>" . $row["genre"] . "</td>";
                            echo "<td class='text-nowrap'>" . $row["stok"] . "</td>";
                            echo "<td class='text-nowrap'>";
                            echo '<a class="btn btn-outline-warning" href="editBooks.php?id=' . $row['id'] . '">Edit</a>   ';
                            echo '<a class="btn btn-outline-danger" href="proses/deleteBooks.php?id=' . $row['id'] . '" onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\')">Hapus</a>';
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>Tidak ada data buku.</td></tr>";
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