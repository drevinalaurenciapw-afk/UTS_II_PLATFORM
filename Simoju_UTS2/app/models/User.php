<?php

class User extends Model {

    // REGISTER
    public function register($data)
    {
        $nama = $data['nama'];
        $email = $data['email'];

        $password =
        password_hash(
            $data['password'],
            PASSWORD_DEFAULT
        );

        $query = "
        INSERT INTO users
        (nama,email,password,role)
        VALUES
        ('$nama','$email','$password','user')
        ";

        return $this->db->query($query);
    }

    public function emailExists($email)
    {
        $query =
        "SELECT * FROM users
        WHERE email = '$email'";

        $result =
        $this->db->query($query);

        return $result->num_rows > 0;
    }

    public function getAllUser()
    {
        $query = "SELECT * FROM users";

        return $this->db->query($query);
    }

   public function findByEmail($email)
    {
        $query = "
        SELECT * FROM users
        WHERE email = '$email'
        ";

        $result = $this->db->query($query);

        return $result->fetch_assoc();
    }

    public function countAll()
    {
        $query =
        "SELECT COUNT(*) as total
        FROM users";

        $result =
        $this->db->query($query);

        return $result->fetch_assoc()['total'];
    }
}