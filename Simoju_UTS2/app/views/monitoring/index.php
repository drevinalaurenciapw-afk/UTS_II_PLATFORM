<h2>Monitoring Realtime Jakarta</h2>

<p>Suhu: <span id="suhu">-</span></p>
<p>AQI: <span id="polusi">-</span></p>
<p>Status: <span id="status">-</span></p>
<p>Update: <span id="update">-</span></p>

<script>
async function fetchData() {
    const res = await fetch('index.php?url=MonitoringController/api');
    const data = await res.json();

    const iq = data.data.current;

    const suhu = iq.weather.tp;
    const aqi = iq.pollution.aqius;

    let status = "";
    if(aqi <= 50) status = "Baik";
    else if(aqi <= 100) status = "Sedang";
    else if(aqi <= 150) status = "Tidak Sehat";
    else status = "Berbahaya";

    document.getElementById("suhu").innerText = suhu + " °C";
    document.getElementById("polusi").innerText = aqi;
    document.getElementById("status").innerText = status;
}

setInterval(fetchData, 10000);

// sync DB tiap 1 menit
setInterval(() => {
    fetch('index.php?url=MonitoringController/sync');
}, 60000);

fetchData();
</script>