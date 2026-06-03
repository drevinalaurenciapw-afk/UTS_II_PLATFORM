<?php

$labels = [];
$aqi = [];
$suhu = [];

// ambil data sekali saja
while($row = $data['chart']->fetch_assoc())
{
    // pakai waktu update biar nyambung ke API sync
    $labels[] = date('H:i:s', strtotime($row['created_at']));

    $aqi[] = (float)$row['aqi'];
    $suhu[] = (float)$row['suhu'];
}

// urutan dari lama → terbaru (biar grafik natural)
$labels = array_reverse($labels);
$aqi = array_reverse($aqi);
$suhu = array_reverse($suhu);

?>

<div class="container mt-4">

    <a href="index.php?url=HomeController/dashboard" class="btn btn-secondary">
        Kembali
    </a>

    <h2>Grafik AQI (Realtime Sync)</h2>
    <canvas id="aqiChart"></canvas>

    <hr>

    <h2>Grafik Suhu & AQI (Realtime Sync)</h2>
    <canvas id="chart"></canvas>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

// ======================
// AQI ONLY
// ======================
new Chart(document.getElementById('aqiChart'), {
    type: 'line',
    data: {
        labels: <?= json_encode($labels); ?>,
        datasets: [{
            label: 'AQI',
            data: <?= json_encode($aqi); ?>,
            borderWidth: 3,
            tension: 0.3
        }]
    },
    options: {
        responsive: true,
        animation: false
    }
});

// ======================
// SUHU + AQI
// ======================
new Chart(document.getElementById('chart'), {
    type: 'line',
    data: {
        labels: <?= json_encode($labels); ?>,
        datasets: [
            {
                label: 'Suhu (°C)',
                data: <?= json_encode($suhu); ?>,
                tension: 0.3
            },
            {
                label: 'AQI',
                data: <?= json_encode($aqi); ?>,
                tension: 0.3
            }
        ]
    },
    options: {
        responsive: true,
        animation: false
    }
});

</script>