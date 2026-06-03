<?php

class EdukasiController extends Controller {

    public function index()
    {
        $edukasi = $this->model('Edukasi');

        $data['edukasi'] = $edukasi->getAll();

        $this->view('edukasi/index', $data);
    }

    public function tambah()
    {
        if($_SESSION['role'] != 'admin')
        {
            die('Akses Ditolak');
        }

        $this->view('edukasi/tambah');
    }

    public function store()
    {
        $namaFile =
        $_FILES['gambar']['name'];

        move_uploaded_file(
            $_FILES['gambar']['tmp_name'],
            '../public/uploads/artikel/' . $namaFile
        );

        $_POST['gambar'] = $namaFile;

        $edukasi = $this->model('Edukasi');

        $edukasi->insert($_POST);

        header(
            "Location: /Simoju_UTS2/public/index.php?url=EdukasiController/index"
        );

        exit;
    }

    public function edit($id)
    {
        $edukasi = $this->model('Edukasi');

        $data['edukasi'] = $edukasi->getById($id);

        $this->view('edukasi/edit', $data);
    }

    public function update($id)
    {
        $edukasi = $this->model('Edukasi');

        $data = $_POST;

        if($_FILES['gambar']['name'] != '')
        {
            $namaFile = $_FILES['gambar']['name'];

            move_uploaded_file(
                $_FILES['gambar']['tmp_name'],
                '../public/uploads/artikel/' . $namaFile
            );

            $data['gambar'] = $namaFile;
        }

        $edukasi->update($id, $data);

        header("Location: /Simoju_UTS2/public/index.php?url=EdukasiController/index");
        exit;
    }

    public function detail($id)
    {
        $edukasi = $this->model('Edukasi');

        $data['edukasi'] =
        $edukasi->getById($id);

        $this->view(
            'edukasi/detail',
            $data
        );
    }

    public function delete($id)
    {
         if($_SESSION['role'] != 'admin')
        {
            die('Akses Ditolak');
        }

        $edukasi = $this->model('Edukasi');

        $edukasi->delete($id);

        header("Location: /Simoju_UTS2/public/index.php?url=EdukasiController/index");
        exit;
    }
}