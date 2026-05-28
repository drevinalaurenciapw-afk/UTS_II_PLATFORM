<?php

require_once '../app/middleware/UserMiddleware.php';
require_once '../config/api.php';

class MonitoringController extends Controller
{
    public function index()
    {
        UserMiddleware::check();

        // =========================
        // DEFAULT DATA
        // =========================

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
        // MULTI WILAYAH AQICN
        // =========================

        $wilayahList = [
            'jakarta',
            'kelapagading',
            'jagakarsa',
            'kemayoran'
        ];

        $data['monitoring'] = [];

        foreach($wilayahList as $wilayah)
        {
            $aqiUrl =
            "https://api.waqi.info/feed/" .
            $wilayah .
            "/?token=6b305246e9d289ac5dba545cb95584e73a5e14e9";

            $aqiResponse =
            @file_get_contents($aqiUrl);

            if ($aqiResponse !== false) {

                $aqiResult =
                json_decode($aqiResponse, true);

                if (
                    isset($aqiResult['status']) &&
                    $aqiResult['status'] == 'ok'
                ) {

                    $aqi =
                    $aqiResult['data']['aqi'];

                    $wilayahNama =
                    $aqiResult['data']['city']['name'];

                    $suhu =
                    $aqiResult['data']['iaqi']['t']['v'] ?? 0;

                    // KATEGORI

                    if ($aqi <= 50) {

                        $kategori = "Baik";

                    } elseif ($aqi <= 100) {

                        $kategori = "Sedang";

                    } elseif ($aqi <= 150) {

                        $kategori = "Tidak Sehat";

                    } else {

                        $kategori = "Berbahaya";
                    }

                    // SIMPAN KE ARRAY

                    $data['monitoring'][] = [

                        'wilayah' => $wilayahNama,
                        'suhu' => $suhu,
                        'aqi' => $aqi,
                        'kategori' => $kategori
                    ];
                }
            }
        }

        // =========================
        // AQI UTAMA DASHBOARD
        // =========================

        if (!empty($data['monitoring'])) {

            $data['wilayah'] =
            $data['monitoring'][0]['wilayah'];

            $data['suhu'] =
            $data['monitoring'][0]['suhu'];

            $data['aqi'] =
            $data['monitoring'][0]['aqi'];

            $data['kategori'] =
            $data['monitoring'][0]['kategori'];
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
