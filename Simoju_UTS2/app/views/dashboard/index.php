<?php require_once '../app/views/layouts/navbar.php'; ?>

<h1>Dashboard SIMOJU</h1>

<p>Selamat datang, <?= $_SESSION['nama']; ?></p>

<hr>

<h3>Suhu Rata-rata</h3>
<h2 id="suhu">-</h2>

<br>

<h3>AQI Rata-rata</h3>
<h2 id="aqi">-</h2>

<hr>

<script>
function loadRealtime() {
    fetch("index.php?url=MonitoringController/realtime")
        .then(res => res.json())
        .then(data => {
            document.getElementById("suhu").innerText = data.rata_suhu;
            document.getElementById("aqi").innerText = data.rata_aqi;
        })
        .catch(err => console.log("error:", err));
}

// load pertama kali
loadRealtime();

// update tiap 5 detik
setInterval(loadRealtime, 5000);
</script>