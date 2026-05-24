<?php

require_once '../app/middleware/UserMiddleware.php';
require_once '../config/api.php';

class MonitoringController extends Controller
{
    public function index()
    {
        UserMiddleware::check();

        // DEFAULT DATA
        $data['wilayah'] = "Jakarta";
        $data['suhu'] = 32.5;
        $data['aqi'] = 50;

        // =========================
        // OPENWEATHER API
        // =========================

        if (!empty(OPENWEATHER_API_KEY)) {

            $url =
            "https://api.openweathermap.org/data/2.5/weather?q=Jakarta,id&appid=" .
            OPENWEATHER_API_KEY .
            "&units=metric";

            $response = @file_get_contents($url);

            if ($response !== false) {

                $result = json_decode($response, true);

                $data['suhu'] =
                $result['main']['temp'] ?? 32.5;
            }
        }

        // =========================
        // AQICN API REALTIME
        // =========================

        $aqiUrl =
        "https://api.waqi.info/feed/jakarta/?token=6b305246e9d289ac5dba545cb95584e73a5e14e9";

        $aqiResponse =
        @file_get_contents($aqiUrl);

        if ($aqiResponse !== false) {

            $aqiResult =
            json_decode($aqiResponse, true);

            if (
                isset($aqiResult['status']) &&
                $aqiResult['status'] == 'ok'
            ) {

                $data['aqi'] =
                $aqiResult['data']['aqi'];

                $data['wilayah'] =
                $aqiResult['data']['city']['name'];
            }
        }

        // =========================
        // KATEGORI AQI
        // =========================

        if ($data['aqi'] <= 50) {

            $data['kategori'] = "Baik";

        } elseif ($data['aqi'] <= 100) {

            $data['kategori'] = "Sedang";

        } elseif ($data['aqi'] <= 150) {

            $data['kategori'] = "Tidak Sehat";

        } else {

            $data['kategori'] = "Berbahaya";
        }

        // =========================
        // SIMPAN RIWAYAT
        // =========================

        $monitoring = $this->model('Monitoring');

        $monitoring->simpanRiwayat(
            $data['wilayah'],
            $data['suhu'],
            $data['aqi'],
            $data['kategori']
        );

        // =========================
        // NOTIFIKASI
        // =========================

        $notifikasi = $this->model('Notifikasi');

        if ($data['aqi'] > 150) {

            $notifikasi->tambah(
                "Peringatan Polusi",
                "Udara sangat berbahaya, hindari aktivitas luar ruangan.",
                "bahaya"
            );

        } elseif ($data['aqi'] > 100) {

            $notifikasi->tambah(
                "Waspada Polusi",
                "Kurangi aktivitas di luar ruangan.",
                "waspada"
            );
        }

        // =========================
        // VIEW
        // =========================

        $this->view('user/monitoring/index', $data);
    }
}