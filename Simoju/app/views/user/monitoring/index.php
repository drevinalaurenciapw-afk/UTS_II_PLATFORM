<!DOCTYPE html>
<html>
<head>
    <title>Monitoring Udara</title>

    <link rel="stylesheet" href="/simoju/public/assets/css/style.css">
</head>
<body>

<?php require_once __DIR__ . '/../../layouts/navbar.php'; ?>

<div class="container">

    <div class="welcome-box">

        <h1>Monitoring Realtime Kualitas Udara</h1>

        <p>
            Data realtime dari OpenWeather & AQICN API
        </p>

    </div>

    <div class="card-container">

        <div class="card">

            <h2>
                <?= $data['aqi']; ?>
            </h2>

            <p>
                AQI
            </p>

        </div>

        <div class="card">

            <h2>
                <?= $data['suhu']; ?>°C
            </h2>

            <p>
                Suhu
            </p>

        </div>

        <div class="card">

            <h2>
                <?= $data['kategori']; ?>
            </h2>

            <p>
                Status Udara
            </p>

        </div>

    </div>

    <?php if($data['aqi'] > 150): ?>

        <div class="alert-danger">
            ⚠️ Udara sangat berbahaya, hindari aktivitas luar ruangan.
        </div>

    <?php elseif($data['aqi'] > 100): ?>

        <div class="alert-warning">
            ⚠️ Kualitas udara tidak sehat untuk kelompok sensitif.
        </div>

    <?php else: ?>

        <div class="alert-safe">
            ✅ Kualitas udara masih aman.
        </div>

    <?php endif; ?>

    <div class="table-box">

        <table>

            <tr>
                <th>Wilayah</th>
                <th>Suhu</th>
                <th>AQI</th>
                <th>Status</th>
            </tr>

            <tr>

                <td>
                    <?= $data['wilayah']; ?>
                </td>

                <td>
                    <?= $data['suhu']; ?>°C
                </td>

                <td>
                    <?= $data['aqi']; ?>
                </td>

                <td>

                    <?php if($data['aqi'] <= 50): ?>

                        <span class="safe">
                            Baik
                        </span>

                    <?php elseif($data['aqi'] <= 100): ?>

                        <span class="warning">
                            Sedang
                        </span>

                    <?php elseif($data['aqi'] <= 150): ?>

                        <span class="warning">
                            Tidak Sehat
                        </span>

                    <?php else: ?>

                        <span class="danger">
                            Berbahaya
                        </span>

                    <?php endif; ?>

                </td>

            </tr>

        </table>

    </div>

</div>

</body>
</html>