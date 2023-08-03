<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Why Library</title>
    <meta name="description" content="Halaman Login Pengguna">
    <meta name="author" content="Wahyu Tri Novianto">
    <link href="include/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .header {
            text-align: center;
            margin: 30px 0;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="include/img/icon.svg" alt="Logo" class="img-fluid" width="200">
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h2>Login Pengguna</h2>
                <form action="proses/loginAuth.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <button href="admin/aLogin.php" type="submit" class="btn btn-outline-primary">Login</button>
                    | <a href="admin/aLogin.php">Login Admin</a>
                </form>
            </div>
        </div>
    </div>


    <script src="include/js/bootstrap.bundle.min.js"></script>
</body>

</html>