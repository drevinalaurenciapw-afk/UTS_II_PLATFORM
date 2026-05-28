<!DOCTYPE html>
<html>
<head>

    <title>Monitoring Udara</title>

    <link rel="stylesheet" href="/simoju/public/assets/css/style.css">

    <!-- AUTO REFRESH -->
    <meta http-equiv="refresh" content="60">

</head>

<body>

<?php require_once __DIR__ . '/../../layouts/navbar.php'; ?>

<div class="container">

    <!-- HEADER -->

    <div class="welcome-box">

        <h1>
            Monitoring Realtime Kualitas Udara
        </h1>

        <p>
            Data realtime dari OpenWeather & AQICN API
        </p>

    </div>

    <!-- CARD -->

    <div class="card-container">

<?php foreach($data['monitoring'] as $row): ?>

    <div class="card">

        <h2>
            <?= $row['aqi']; ?>
        </h2>

        <p>
            <?= $row['wilayah']; ?>
        </p>

        <small>
            <?= $row['kategori']; ?>
        </small>

    </div>

<?php endforeach; ?>

</div>

           

    <!-- ALERT -->

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

    <!-- TABLE -->

    <div class="table-box">

        <h2>
            Monitoring Multi Wilayah Jakarta
        </h2>

        <table>

            <tr>

                <th>Wilayah</th>
                <th>Suhu</th>
                <th>AQI</th>
                <th>Status</th>

            </tr>

            <?php foreach($data['monitoring'] as $row): ?>

            <tr>

                <td>
                    <?= $row['wilayah']; ?>
                </td>

                <td>
                    <?= $row['suhu']; ?>°C
                </td>

                <td>
                    <?= $row['aqi']; ?>
                </td>

                <td>

                    <?php if($row['aqi'] <= 50): ?>

                        <span class="safe">
                            Baik
                        </span>

                    <?php elseif($row['aqi'] <= 100): ?>

                        <span class="warning">
                            Sedang
                        </span>

                    <?php elseif($row['aqi'] <= 150): ?>

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

            <?php endforeach; ?>

        </table>

    </div>

    <!-- CHART -->

    <div class="chart-box">

        <h2>
            Grafik AQI Realtime
        </h2>

        <canvas id="aqiChart"></canvas>

    </div>

</div>

<!-- CHART JS -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx =
document.getElementById('aqiChart');

new Chart(ctx, {

    type: 'line',

    data: {

        labels: [
            '1 Jam Lalu',
            '45 Menit',
            '30 Menit',
            '15 Menit',
            'Sekarang'
        ],

        datasets: [{

            label: 'AQI',

            data: [

                <?= $data['aqi'] - 15; ?>,
                <?= $data['aqi'] - 10; ?>,
                <?= $data['aqi'] - 5; ?>,
                <?= $data['aqi'] - 2; ?>,
                <?= $data['aqi']; ?>

            ],

            borderWidth: 3,
            tension: 0.4

        }]
    }

});

</script>

<!-- FOOTER -->

<div class="footer">

    Monitoring realtime kualitas udara SIMOJU © 2026

</div>

</body>
</html>
