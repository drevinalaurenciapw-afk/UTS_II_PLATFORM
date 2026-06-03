<?php

class NotifikasiController extends Controller {

    public function index()
    {
        $notifikasi = $this->model('Notifikasi');

        $data['notifikasi'] =
        $notifikasi->getAll();

        $this->view(
            'notifikasi/index',
            $data
        );
    }

    public function tambah()
    {
        $this->view('notifikasi/tambah');
    }

    public function store()
    {
        $notifikasi = $this->model('Notifikasi');

        $notifikasi->insert($_POST);

        header(
            "Location: /Simoju_UTS2/public/index.php?url=NotifikasiController/index"
        );

        exit;
    }

    public function edit($id)
    {
        $notifikasi = $this->model('Notifikasi');

        $data['notifikasi'] =
        $notifikasi->getById($id);

        $this->view(
            'notifikasi/edit',
            $data
        );
    }

    public function update($id)
    {
        $notifikasi = $this->model('Notifikasi');

        $notifikasi->update(
            $id,
            $_POST
        );

        header(
            "Location: /Simoju_UTS2/public/index.php?url=NotifikasiController/index"
        );

        exit;
    }

    public function delete($id)
    {
        $notifikasi = $this->model('Notifikasi');

        $notifikasi->delete($id);

        header(
            "Location: /Simoju_UTS2/public/index.php?url=NotifikasiController/index"
        );

        exit;
    }
}