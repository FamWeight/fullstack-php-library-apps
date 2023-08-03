<nav class="navbar bg-body-tertiary sticky-top">

    <div class="container-fluid">
        <a class="navbar-brand" href="dashboard.php">
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
                    <li class="nav-item mb-4">
                        <a class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="profile.php">Profil</a>
                    </li>
                    <li class="nav-item mb-4">
                        <a class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="availBooks.php">Buku Yang Tersedia</a>
                    </li>
                </ul>
                <button class="btn btn-outline-danger" href="" onclick="return confirmLogout();">
                    Logout
                </button>
            </div>

        </div>
    </div>
</nav>