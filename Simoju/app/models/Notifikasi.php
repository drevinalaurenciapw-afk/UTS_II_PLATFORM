<?php

class Notifikasi extends Model
{
    public function tambah(
        $judul,
        $pesan,
        $level
    )
    {
        $query = "
        INSERT INTO notifikasi
        (
            judul,
            pesan,
            level
        )
        VALUES
        (
            '$judul',
            '$pesan',
            '$level'
        )";

        return $this->db->query($query);
    }

    public function getAll()
    {
        return $this->db->query(
            "SELECT * FROM notifikasi
             ORDER BY id DESC"
        );
    }
}
