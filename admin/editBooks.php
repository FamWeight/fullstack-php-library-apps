<?php include 'include/pageAuth.php' ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Why Library</title>
    <meta name="description" content="Halaman yang mengubah data buku di Why Library">
    <meta name="author" content="Wahyu Tri Novianto">
    <link rel="stylesheet" href="include/css/bootstrap.min.css">
</head>

<body>
    <?php include 'include/navbar.php' ?>

    <div class="container mt-5">
        <h1>Ubah Data Buku</h1>
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
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        include 'include/conn.php';
                        if (mysqli_connect_errno()) {
                            echo "Koneksi database gagal: " . mysqli_connect_error();
                            exit();
                        }
                        $query = "SELECT * FROM books WHERE id = $id";
                        $result = mysqli_query($conn, $query);
                        if ($result) {
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <form method='POST' action='proses/updateBooks.php'>
                                        <tr>
                                            <input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><input type='text' name='judul' value='<?php echo $row['judul']; ?>'></td>
                                            <td><input type='text' name='pengarang' value='<?php echo $row['pengarang']; ?>'></td>
                                            <td><input type='text' name='genre' value='<?php echo $row['genre']; ?>'></td>
                                            <td><input type='number' name='stok' value='<?php echo $row['stok']; ?>'></td>
                                            <td>
                                                <button type='submit' class='btn btn-primary' name='submit' onclick="return confirm('Apakah Anda yakin ingin memperbarui data ini?')">Simpan</button>
                                            </td>
                                        </tr>
                                    </form>
                    <?php }
                            } else {
                                echo "Data buku tidak ditemukan.";
                            }
                        } else {
                            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
                        }
                        $conn->close();
                    } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="include/js/logoutConfirm.js"></script>
    <script src="include/js/jquery.min.js"></script>
    <script src="include/js/bootstrap.bundle.min.js"></script>
</body>

</html>