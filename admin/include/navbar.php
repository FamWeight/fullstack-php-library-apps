<nav class="navbar bg-body-tertiary sticky-top">

    <div class="container-fluid">
        <a class="navbar-brand" href="aDashboard.php">
            <img src="include/img/icon.svg" alt="Bootstrap" width="150" height="80">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Why Library</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                Pengguna
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="addUsers.php">Tambah Pengguna</a></li>
                                <li><a class="dropdown-item" href="listUsers.php">List Daftar Pengguna</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                Buku
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="addBooks.php">Tambah Buku</a></li>
                                <li><a class="dropdown-item" href="listBooks.php">List Daftar Buku</a></li>
                                <li><a class="dropdown-item" href="listTransaction.php">Transaksi Peminjaman</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <button class="btn btn-outline-danger" href="" onclick="return confirmLogout();">
                    Logout
                </button>
            </div>
        </div>
    </div>
</nav>