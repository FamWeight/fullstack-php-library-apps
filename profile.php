<?php
include 'include/pageAuth.php';
include 'include/conn.php';
// Ambil username dari session
$username = $_SESSION['username'];
// Query untuk mendapatkan data user berdasarkan username
$query = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($query);
//Jika 1 baris
if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    // Menempatkan data kedalam variabel
    $id = $row['id'];
    $nama = $row['nama'];
    $jenis_kelamin = $row['jenis_kelamin'];
    $pekerjaan = $row['pekerjaan'];
    $no_hp = $row['no_hp'];
    $alamat = $row['alamat'];
} else {
    echo "Data user tidak ditemukan.";
    exit();
}
$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Why Library</title>
    <meta name="description" content="Halaman profil pengguna">
    <meta name="author" content="Wahyu Tri Novianto">
    <link rel="stylesheet" href="include/css/bootstrap.min.css">
</head>

<body>
    <?php include 'include/navbar.php' ?>

    <div class="container mt-5">
        <h1>Profil Pengguna</h1>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>Username</th>
                    <td><?php echo $username; ?></td>
                </tr>
                <tr>
                    <th>ID</th>
                    <td><?php echo $id; ?></td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td><?php echo $nama; ?></td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td><?php echo $jenis_kelamin; ?></td>
                </tr>
                <tr>
                    <th>Pekerjaan</th>
                    <td><?php echo $pekerjaan; ?></td>
                </tr>
                <tr>
                    <th>No. HP</th>
                    <td><?php echo $no_hp; ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td><?php echo $alamat; ?></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="container mt-3">
        <a class="btn btn-outline-success" href="changePassword.php">Ganti Password</a>
    </div>

    <script src="include/js/logoutConfirm.js"></script>
    <script src="include/js/jquery.min.js"></script>
    <script src="include/js/bootstrap.bundle.min.js"></script>
</body>

</html>