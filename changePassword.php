<?php include 'include/pageAuth.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Why Library - Ganti Password</title>
    <meta name="description" content="Halaman permintaan ganti password oleh user">
    <meta name="author" content="Wahyu Tri Novianto">
    <link rel="stylesheet" href="include/css/bootstrap.min.css">
</head>

<body>
    <?php include 'include/navbar.php'; ?>

    <div class="container mt-5">
        <h1>Ganti Password</h1>
        <form action="proses/editPassword.php" method="post">
            <div class="form-group">
                <label for="old_password">Password Lama</label>
                <input type="password" class="form-control" id="old_password" name="old_password" required>
            </div>
            <div class="form-group">
                <label for="new_password">Password Baru</label>
                <input type="password" class="form-control" id="new_password" name="new_password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Konfirmasi Password Baru</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-outline-primary">Simpan</button>
            </div>
        </form>
    </div>

    <script src="include/js/logoutConfirm.js"></script>
    <script src="include/js/jquery.min.js"></script>
    <script src="include/js/bootstrap.bundle.min.js"></script>
</body>

</html>