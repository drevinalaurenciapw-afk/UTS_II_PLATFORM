<?php

require_once '../app/middleware/AdminMiddleware.php';

class EdukasiController extends Controller
{
    public function index()
    {
        AdminMiddleware::check();

        $edukasi = $this->model('Edukasi');

        $data['edukasi'] =
        $edukasi->getAll();

        $this->view(
            'admin/edukasi/index',
            $data
        );
    }

    public function tambah()
    {
        AdminMiddleware::check();

        $this->view(
            'admin/edukasi/tambah'
        );
    }
}
public function store()
{
    AdminMiddleware::check();

    $gambar = "";

    if(isset($_FILES['gambar']))
    {
        $gambar = time() . "_" .
                  $_FILES['gambar']['name'];

        move_uploaded_file(
            $_FILES['gambar']['tmp_name'],
            "../public/uploads/edukasi/" . $gambar
        );
    }

    $data = [
        'judul' => $_POST['judul'],
        'isi' => $_POST['isi'],
        'status' => $_POST['status'],
        'gambar' => $gambar
    ];

    $edukasi = $this->model('Edukasi');

    $edukasi->insert($data);

    header("Location: /simoju/public/EdukasiController/index");
}
public function edit($id)
{
    AdminMiddleware::check();

    $edukasi = $this->model('Edukasi');

    $data['artikel'] =
    $edukasi->getById($id);

    $this->view(
        'admin/edukasi/edit',
        $data
    );
}
public function update($id)
{
    AdminMiddleware::check();

    $data = [

        'judul' => $_POST['judul'],
        'isi' => $_POST['isi'],
        'status' => $_POST['status']

    ];

    $edukasi = $this->model('Edukasi');

    $edukasi->update($id,$data);

    header("Location: /simoju/public/EdukasiController/index");
}
public function delete($id)
{
    AdminMiddleware::check();

    $edukasi = $this->model('Edukasi');

    $edukasi->delete($id);

    header("Location: /simoju/public/EdukasiController/index");
}
public function user()
{
    UserMiddleware::check();

    $edukasi = $this->model('Edukasi');

    $data['edukasi'] = $edukasi->getPublish();

    $this->view('user/edukasi/index', $data);
}
