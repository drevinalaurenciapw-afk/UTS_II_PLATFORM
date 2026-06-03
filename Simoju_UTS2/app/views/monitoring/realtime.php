<h2>Monitoring Realtime Jakarta</h2>

<p>Suhu: <span id="suhu">-</span></p>
<p>Polusi: <span id="polusi">-</span></p>
<p>Status: <span id="status">-</span></p>
<p>Last Update: <span id="update">-</span></p>

<p>Waktu Sekarang: <span id="jam"></span></p>

<script>
// ======================
// CONFIG ENDPOINT
// ======================
const API_URL = '/Simoju_UTS2/public/index.php?url=MonitoringController/api';
const SYNC_URL = '/Simoju_UTS2/public/index.php?url=MonitoringController/sync';

// ======================
// FETCH DATA API
// ======================
async function fetchData() {
    try {
        const res = await fetch(API_URL);
        const data = await res.json();

        const iq = data.data.current;

        const suhu = iq.weather.tp;
        const aqi = iq.pollution.aqius;
        const update = iq.pollution.ts;

        let status = "";
        if (aqi <= 50) status = "Baik";
        else if (aqi <= 100) status = "Sedang";
        else if (aqi <= 150) status = "Tidak Sehat";
        else status = "Berbahaya";

        document.getElementById("suhu").innerText = suhu + " °C";
        document.getElementById("polusi").innerText = aqi;
        document.getElementById("status").innerText = status;
        document.getElementById("update").innerText = update;

    } catch (error) {
        console.error("Gagal fetch data:", error);
    }
}

// ======================
// AUTO SYNC KE DATABASE (60 DETIK)
// ======================
function syncData() {
    fetch(SYNC_URL)
        .then(res => res.text())
        .then(res => console.log("Sync DB:", res))
        .catch(err => console.error("Sync gagal:", err));
}

// ======================
// REALTIME LOOP
// ======================
fetchData();
setInterval(fetchData, 10000);

syncData();
setInterval(syncData, 60000);

// ======================
// JAM REALTIME
// ======================
function updateClock() {
    const now = new Date();
    document.getElementById("jam").innerText = now.toLocaleString();
}

updateClock();
setInterval(updateClock, 1000);
</script>