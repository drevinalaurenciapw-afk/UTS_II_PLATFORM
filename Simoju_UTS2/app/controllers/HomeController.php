<?php

class HomeController extends Controller {

    public function index()
    {
        $this->dashboard();
    }

    public function dashboard()
    {
        // CEK LOGIN
        if(!isset($_SESSION['user_id']))
        {
            header("Location: /Simoju_UTS2/public/index.php?url=AuthController/login");
            exit;
        }

        // MODEL
        $monitoring = $this->model('Monitoring');

        // DATA TOTAL
        $data['totalArtikel'] = $this->model('Edukasi')->countAll();
        $data['totalMonitoring'] = $monitoring->countAll();
        $data['totalNotifikasi'] = $this->model('Notifikasi')->countAll();
        $data['totalUser'] = $this->model('User')->countAll();

        // 🔥 RATA-RATA
        $data['rata_suhu'] = $monitoring->getRataSuhu();
        $data['rata_aqi'] = $monitoring->getRataAqi();

        // 🔥 DATA TERBARU (REALTIME DARI DATABASE)
        $latest = $monitoring->getLatest();

        $data['suhu'] = $latest['suhu'] ?? 0;
        $data['aqi'] = $latest['aqi'] ?? 0;
        $data['status'] = $latest['status'] ?? 'Tidak diketahui';

        // optional (bisa kamu ganti dari API nanti)
        $data['cuaca'] = 'Cerah';

        // VIEW
        $this->view('home/dashboard', $data);
    }
}