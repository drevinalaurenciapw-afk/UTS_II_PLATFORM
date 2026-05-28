<?php

class Edukasi extends Model
{
    private $table = "edukasi";

    public function getAll()
    {
        $query = "SELECT * FROM {$this->table}
                  ORDER BY id DESC";

        return $this->db->query($query);
    }

    public function getById($id)
    {
        $query = "SELECT * FROM {$this->table}
                  WHERE id = $id";

        $result = $this->db->query($query);

        return $result->fetch_assoc();
    }

    public function insert($data)
    {
        $judul = $data['judul'];
        $isi = $data['isi'];
        $gambar = $data['gambar'];
        $status = $data['status'];
        $created_by = $_SESSION['user_id'];

        $query = "INSERT INTO edukasi
                  (
                    judul,
                    gambar,
                    isi,
                    status,
                    created_by
                  )
                  VALUES
                  (
                    '$judul',
                    '$gambar',
                    '$isi',
                    '$status',
                    '$created_by'
                  )";

        return $this->db->query($query);
    }

    public function update($id,$data)
    {
        $query = "UPDATE edukasi SET
                  judul='{$data['judul']}',
                  isi='{$data['isi']}',
                  status='{$data['status']}'
                  WHERE id=$id";

        return $this->db->query($query);
    }

    public function delete($id)
    {
        return $this->db->query(
            "DELETE FROM edukasi WHERE id=$id"
        );
    }
    public function getPublish()
{
    return $this->db->query(
        "SELECT * FROM edukasi 
         WHERE status = 'publish'
         ORDER BY id DESC"
    );
}
}
