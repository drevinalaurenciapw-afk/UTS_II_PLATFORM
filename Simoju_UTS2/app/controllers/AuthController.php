<?php

class AuthController extends Controller {

    public function login()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $userModel = $this->model('User');

            $user =
            $userModel->findByEmail(
                $_POST['email']
            );

            // EMAIL TIDAK DITEMUKAN
            if(!$user)
            {
                $data['error'] =
                "Email tidak terdaftar.";

                $this->view(
                    'auth/login',
                    $data
                );
                return;
            }

            // PASSWORD SALAH
            if(
                !password_verify(
                    $_POST['password'],
                    $user['password']
                )
            )
            {
                $data['error'] =
                "Password yang Anda masukkan salah.";

                $this->view(
                    'auth/login',
                    $data
                );
                return;
            }

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['role'] = $user['role'];

            header(
                "Location: /Simoju_UTS2/public/index.php?url=HomeController/dashboard"
            );
            exit;
        }

        $this->view('auth/login');
    }

    public function register()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $userModel = $this->model('User');

            if(
                $userModel->emailExists(
                    $_POST['email']
                )
            )
            {
                $data['error'] =
                "Email sudah digunakan!";

                $this->view(
                    'auth/register',
                    $data
                );

                return;
            }

            $userModel->register($_POST);

            header(
            "Location: /Simoju_UTS2/public/index.php?url=AuthController/login"
            );

            exit;
        }

        $this->view('auth/register');
    }

    public function logout()
    {
        $_SESSION = [];

        session_destroy();

        header("Location: /Simoju_UTS2/public/index.php?url=AuthController/login");
        exit;
    }
}