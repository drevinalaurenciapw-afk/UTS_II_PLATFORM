<?php

class AuthController extends Controller
{
    public function login()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $userModel = $this->model('User');
            $user = $userModel->findByEmail($_POST['email']);

            if($user && password_verify($_POST['password'], $user['password']))
            {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['nama'] = $user['nama'];
                $_SESSION['role'] = $user['role'];

                if($user['role'] == 'admin')
                {
                    header("Location: /simoju/public/index.php?url=DashboardController/admin");
                }
                else
                {
                    header("Location: /simoju/public/index.php?url=DashboardController/user");
                }

                exit;
            }

            $data['error'] = "Email atau Password salah";
        }

        $this->view('auth/login');
    }

    public function register()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $userModel = $this->model('User');

            $userModel->register($_POST);

            header("Location: /simoju/public/index.php?url=AuthController/login");
            exit;
        }

        $this->view('auth/register');
    }

    public function logout()
    {
        session_destroy();

        header("Location: /simoju/public/index.php?url=AuthController/login");
        exit;
    }
}
