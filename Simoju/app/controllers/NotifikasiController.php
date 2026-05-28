<?php

require_once '../app/middleware/UserMiddleware.php';

class NotifikasiController extends Controller
{
    public function index()
    {
        UserMiddleware::check();

        $notifikasi = $this->model('Notifikasi');

        $data['notifikasi']=
        $notifikasi->getAll();

        $this->view(
            'user/notifikasi/index',
            $data
        );
    }
    
}
