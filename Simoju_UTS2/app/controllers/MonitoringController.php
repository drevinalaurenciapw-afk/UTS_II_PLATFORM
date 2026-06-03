<?php
require_once '../config/api.php';

class MonitoringController extends Controller {

    public function index()
    {
        $monitoring = $this->model('Monitoring');
        $data = $monitoring->getLatest();

        $this->view('monitoring/index', $data);
    }

    public function daftar()
    {
        $monitoring = $this->model('Monitoring');
        $data['monitoring'] = $monitoring->getAllMonitoring();

        $this->view('monitoring/daftar', $data);
    }

    public function store()
    {
        $monitoring = $this->model('Monitoring');

        if(isset($_POST['aqi'])){
            $_POST['status'] = $this->getStatusAqi($_POST['aqi']);
        }

        $monitoring->insert($_POST);

        header("Location: index.php?url=MonitoringController/daftar");
        exit;
    }

    public function delete($id)
    {
        $this->model('Monitoring')->delete($id);

        header("Location: index.php?url=MonitoringController/daftar");
        exit;
    }

    // ================= API =================
    public function api()
    {
        $apiKey = IQAIR_API_KEY;

        $url = "http://api.airvisual.com/v2/city?city=Jakarta&state=Jakarta&country=Indonesia&key=$apiKey";

        $response = file_get_contents($url);

        if(!$response){
            echo json_encode(['error' => 'Gagal ambil API']);
            return;
        }

        echo $response;
    }

   public function sync()
{
    $monitoring = $this->model('Monitoring');

    $data = $monitoring->getIqAirJakarta();
    if (!$data) {
        echo "❌ Gagal ambil API";
        return;
    }

    $iq = $data['data']['current'];

    $suhu = $iq['weather']['tp'] ?? null;
    $aqi  = $iq['pollution']['aqius'] ?? null;
    $waktu_data = $iq['pollution']['ts'] ?? date('Y-m-d H:i:s');

    if ($suhu === null || $aqi === null) {
        echo "❌ Data tidak valid";
        return;
    }

    $kategori = $this->getKategoriAqi($aqi);
    $status   = $this->getStatusAqi($aqi);

    // =========================
    // 🔥 FILTER ANTI DUPLIKAT FINAL (AMAN)
    // =========================
    $last = $monitoring->getLatest();

        if ($last) {
            if (
                (float)$last['aqi'] == (float)$aqi &&
                (float)$last['suhu'] == (float)$suhu
            ) {
                echo "Tidak ada perubahan data";
                return;
            }
        }
  

    // =========================
    // INSERT
    // =========================
    $monitoring->insert([
        'wilayah'    => 'Jakarta Pusat',
        'suhu'       => $suhu,
        'aqi'        => $aqi,
        'kategori'   => $kategori,
        'status'     => $status,
        'waktu_data' => $waktu_data,
        'created_at' => date('Y-m-d H:i:s')
    ]);

    echo "✅ Sync berhasil";
}

    // ================= STATUS =================
    public function getStatusAqi($aqi)
    {
        if($aqi <= 50) return "Baik";
        elseif($aqi <= 100) return "Sedang";
        elseif($aqi <= 150) return "Tidak Sehat";
        else return "Berbahaya";
    }

    // ================= KATEGORI =================
    public function getKategoriAqi($aqi)
    {
        if($aqi <= 50) return "Hijau";
        elseif($aqi <= 100) return "Kuning";
        elseif($aqi <= 150) return "Oranye";
        else return "Merah";
    }

    public function realtime()
{
    $monitoring = $this->model('Monitoring');

    $data = [
        'rata_suhu' => $monitoring->getRataSuhu(),
        'rata_aqi'  => $monitoring->getRataAqi()
    ];

    header('Content-Type: application/json');
    echo json_encode($data);
}

}