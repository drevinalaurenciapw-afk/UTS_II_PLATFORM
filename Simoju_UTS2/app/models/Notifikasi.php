<?php

class Notifikasi extends Model {

    public function getAll()
    {
        $query =
        "SELECT * FROM notifikasi
        ORDER BY id DESC";

        return $this->db->query($query);
    }

    public function getById($id)
    {
        $query =
        "SELECT * FROM notifikasi
        WHERE id = $id";

        $result =
        $this->db->query($query);

        return $result->fetch_assoc();
    }

    public function insert($data)
    {
        $judul = $data['judul'];
        $pesan = $data['pesan'];
        $level = $data['level'];

        $query =
        "INSERT INTO notifikasi
        (judul,pesan,level)
        VALUES
        ('$judul','$pesan','$level')";

        return $this->db->query($query);
    }

    public function update($id,$data)
    {
        $judul = $data['judul'];
        $pesan = $data['pesan'];
        $level = $data['level'];

        $query =
        "UPDATE notifikasi
        SET
        judul='$judul',
        pesan='$pesan',
        level='$level'
        WHERE id=$id";

        return $this->db->query($query);
    }

    public function delete($id)
    {
        $query =
        "DELETE FROM notifikasi
        WHERE id=$id";

        return $this->db->query($query);
    }

    public function countAll()
    {
        $query =
        "SELECT COUNT(*) as total
        FROM notifikasi";

        $result =
        $this->db->query($query);

        return $result->fetch_assoc()['total'];
    }
}