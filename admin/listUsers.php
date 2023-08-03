<?php include 'include/pageAuth.php' ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Why Library</title>
    <meta name="description" content="Halaman Yang Menampilkan Daftar Pengguna">
    <meta name="author" content="Wahyu Tri Novianto">
    <link rel="stylesheet" href="include/css/bootstrap.min.css">
</head>

<body>
    <?php include 'include/navbar.php' ?>

    <div class="container mt-5">
        <h1>Daftar Pengguna</h1>
        <div class="table-responsive">
            <table class="table table-bordered table-striped-columns text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Username</th>
                        <th>Pekerjaan</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'include/conn.php';
                    $query = "SELECT * FROM users";
                    $result = $conn->query($query);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td class='text-nowrap'>" . $row["id"] . "</td>";
                            echo "<td class='text-nowrap'>" . $row["nama"] . "</td>";
                            echo "<td class='text-nowrap'>" . $row["jenis_kelamin"] . "</td>";
                            echo "<td class='text-nowrap'>" . $row["username"] . "</td>";
                            echo "<td class='text-nowrap'>" . $row["pekerjaan"] . "</td>";
                            echo "<td class='text-nowrap'>" . $row["no_hp"] . "</td>";
                            echo "<td class='text-nowrap'>" . $row["alamat"] . "</td>";
                            echo "<td class='text-nowrap'>";
                            echo '<a class="btn btn-outline-warning" href="editUsers.php?id=' . $row['id'] . '">Edit</a>   ';
                            echo '<a class="btn btn-outline-danger" href="proses/deleteUsers.php?id=' . $row['id'] . '" onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\')">Hapus</a>';
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>Tidak ada data pengguna.</td></tr>";
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