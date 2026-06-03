<?php

class Edukasi extends Model {

    public function getAll()
    {
        $query = "SELECT * FROM edukasi ORDER BY id DESC";

        return $this->db->query($query);
    }



    public function insert($data)
    {
        $judul = $data['judul'];
        $gambar = $data['gambar'];
        $isi = $data['isi'];

        $query = "
        INSERT INTO edukasi(judul, isi, gambar)
        VALUES('$judul', '$isi', '$gambar')
        ";

        $result = $this->db->query($query);

        if(!$result)
        {
            die("Error MySQL: " . $this->db->error);
        }

        return $result;
    }

    public function getById($id)
    {
        $query =
        "SELECT * FROM edukasi
        WHERE id = $id";

        $result =
        $this->db->query($query);

        return $result->fetch_assoc();
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

    public function update($id, $data)
    {
        $judul = $data['judul'];
        $isi = $data['isi'];

        if(isset($data['gambar']))
        {
            $gambar = $data['gambar'];

            $query =
            "UPDATE edukasi
            SET
            judul='$judul',
            isi='$isi',
            gambar='$gambar'
            WHERE id=$id";
        }
        else
        {
            $query =
            "UPDATE edukasi
            SET
            judul='$judul',
            isi='$isi'
            WHERE id=$id";
        }

        return $this->db->query($query);
    }

    public function delete($id)
    {
        $query =
        "DELETE FROM edukasi
        WHERE id = $id";

        return $this->db->query($query);
    }

    public function countAll()
    {
        $query =
        "SELECT COUNT(*) as total
        FROM edukasi";

        $result =
        $this->db->query($query);

        return $result->fetch_assoc()['total'];
    }
}