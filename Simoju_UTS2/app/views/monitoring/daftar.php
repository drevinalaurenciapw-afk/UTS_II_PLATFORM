<div class="container mt-4">

<h2>Data Monitoring</h2>

<?php foreach($data['monitoring'] as $row): ?>

<div class="card mb-3 p-3">

    <h5><?= $row['wilayah']; ?></h5>

    <p>Suhu: <?= $row['suhu']; ?> °C</p>
    <p>AQI: <?= $row['aqi']; ?></p>

    <!-- ini tetap ADA -->
    <p>Kategori: <?= $row['kategori'] ?? '-'; ?></p>

    <p>Status: <?= $row['status'] ?? '-'; ?></p>

    <p>
        <small>
            Update: 
            <?= isset($row['created_at']) 
                ? date('d M Y H:i:s', strtotime($row['created_at'])) 
                : '-'; ?>
        </small>
    </p>

</div>

<?php endforeach; ?>

</div>