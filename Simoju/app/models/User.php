<?php

class User extends Model
{
    private $table = "users";

    public function register($data)
    {
        $nama = $this->db->real_escape_string($data['nama']);
        $email = $this->db->real_escape_string($data['email']);
        $password = password_hash($data['password'], PASSWORD_DEFAULT);

        $query = "INSERT INTO {$this->table}
                  (nama,email,password,role)
                  VALUES
                  ('$nama','$email','$password','user')";

        return $this->db->query($query);
    }

    public function findByEmail($email)
    {
        $email = $this->db->real_escape_string($email);

        $query = "SELECT * FROM {$this->table}
                  WHERE email='$email'";

        $result = $this->db->query($query);

        return $result->fetch_assoc();
    }

    public function getById($id)
    {
        $query = "SELECT * FROM {$this->table}
                  WHERE id=$id";

        $result = $this->db->query($query);

        return $result->fetch_assoc();
    }
}