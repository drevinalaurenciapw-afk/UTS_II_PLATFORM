<div class="container mt-5">

    <div class="card shadow p-4">

        <h1 class="mb-3">
            Selamat Datang,
             <?= $_SESSION['nama'] ?? ''; ?>
        </h1>
 
        <hr>

        <h4 class="mb-3">
            Dashboard SIMOJU
        </h4>

        <p>
            Sistem Monitoring Suhu dan Polusi Udara Jakarta
        </p>

        <div class="mt-4">
            <a href="http://localhost/Simoju_UTS2/public/index.php?url=MonitoringController/index"
            class="btn btn-primary">
                Monitoring Suhu
            </a>

            <a href="http://localhost/Simoju_UTS2/public/index.php?url=EdukasiController/index"
            class="btn btn-success">
                Edukasi
            </a>

            <a href="http://localhost/Simoju_UTS2/public/index.php?url=NotifikasiController/index"
            class="btn btn-warning">
                Notifikasi
            </a>

            <a href="http://localhost/Simoju_UTS2/public/index.php?url=AuthController/logout"
               class="btn btn-danger">
                Logout
            </a>
        </div>
    </div>
</div>