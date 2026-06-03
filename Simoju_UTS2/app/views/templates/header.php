<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMOJU</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<?php if(isset($_SESSION['user_id'])): ?>
   <nav class="navbar navbar-expand-lg navbar-dark"
     style="background-color:#1e3a8a;">

        <div class="container">

            <a class="navbar-brand fw-bold"
            href="index.php?url=HomeController/dashboard">

                SIMOJU

            </a>

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse"
                id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link"
                        href="index.php?url=HomeController/dashboard">
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                        href="index.php?url=MonitoringController/daftar">
                            Monitoring
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                        href="index.php?url=EdukasiController/index">
                            Edukasi
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                        href="index.php?url=NotifikasiController/index">
                            Notifikasi
                        </a>
                    </li>

                    <?php if($_SESSION['role'] == 'admin'): ?>

                    <li class="nav-item">
                        <a class="nav-link"
                        href="index.php?url=UserController/index">
                            User
                        </a>
                    </li>

                    <?php endif; ?>

                </ul>

                <span class="navbar-text text-white me-3">

                    Halo,
                    <?= $_SESSION['nama']; ?>

                </span>

                <a
                href="index.php?url=AuthController/logout"
                class="btn btn-outline-light">

                    Logout

                </a>

            </div>

        </div>

    </nav>
    <?php endif; ?>