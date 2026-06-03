<?php

class DashboardController extends Controller {

    public function index()
    {
        session_start();

        // kalau belum login
        if (!isset($_SESSION['user_id'])) {
            header("Location: /Simoju_UTS2/public/AuthController/login");
            exit;
        }

        // kirim data ke view (JANGAN pakai session di view)
        $data['nama'] = $_SESSION['nama'] ?? 'Guest';

        $this->view('dashboard/index', $data);
    }
}