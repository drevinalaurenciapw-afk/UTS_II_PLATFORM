<?php if($_SESSION['role'] == 'user'): ?>

<div class="container mt-4">

    <!-- GREETING -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <h2>
                Halo, <?= $_SESSION['nama']; ?> 👋
            </h2>
            <p class="text-muted">
                Selamat Datang di SIMOJU
            </p>
        </div>
    </div>

    <!-- REALTIME DATA -->
    <div class="row">

        <!-- SUHU -->
        <div class="col-md-6 mb-3">
            <div class="card border-primary shadow">
                <div class="card-body">
                    <h5>Suhu Jakarta</h5>
                    <h2><?= $suhu ?? '32.5'; ?> °C</h2>

                    <span class="badge bg-warning">
                        <?= $cuaca ?? 'Cerah'; ?>
                    </span>
                </div>
            </div>
        </div>

        <!-- AQI -->
        <div class="col-md-6 mb-3">
            <div class="card border-danger shadow">
                <div class="card-body">
                    <h5>Kualitas Udara</h5>
                    <h2><?= $aqi ?? '112'; ?> AQI</h2>

                    <span class="badge bg-dark">
                        <?= $status ?? 'Tidak Sehat'; ?>
                    </span>
                </div>
            </div>
        </div>

    </div>

    <!-- RATA-RATA -->
    <div class="row">

        <div class="col-md-6 mb-3">
            <div class="card shadow border-info">
                <div class="card-body">
                    <h5>Suhu Rata-rata Jakarta</h5>
                    <h3><?= $data['rata_suhu'] ?> °C</h3>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card shadow border-secondary">
                <div class="card-body">
                    <h5>Index Polusi (Rata-rata)</h5>
                    <h3><?= $data['rata_aqi'] ?> AQI</h3>
                </div>
            </div>
        </div>

    </div>

    <!-- KETERANGAN WARNA -->
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow border-secondary">
                <div class="card-body">

                    <h5 class="text-center mb-3">
                        Keterangan Indikator Warna
                    </h5>

                    <div class="mb-2">
                        <i class="bi bi-circle-fill text-success"></i>
                        Baik (0 - 50)
                    </div>

                    <div class="mb-2">
                        <i class="bi bi-circle-fill text-warning"></i>
                        Sedang (51 - 100)
                    </div>

                    <div class="mb-2">
                        <i class="bi bi-circle-fill" style="color: orange;"></i>
                        Tidak Sehat (101 - 150)
                    </div>

                    <div class="mb-2">
                        <i class="bi bi-circle-fill text-danger"></i>
                        Berbahaya (>150)
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>

<?php endif; ?>