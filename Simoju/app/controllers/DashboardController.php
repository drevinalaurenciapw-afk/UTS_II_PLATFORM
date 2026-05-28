<?php

class DashboardController extends Controller
{
    public function index()
    {
        if(!isset($_SESSION['user_id']))
        {
            header("Location: /simoju/public/AuthController/login");
            exit;
        }

        if($_SESSION['role'] == 'admin')
        {
            $this->view('admin/dashboard');
        }
        else
        {
            $this->view('user/dashboard');
        }
    }

    public function admin()
    {
        if($_SESSION['role'] != 'admin')
        {
            header("Location: /simoju/public/DashboardController/index");
            exit;
        }

        $this->view('admin/dashboard');
    }

    public function user()
    {
        if($_SESSION['role'] != 'user')
        {
            header("Location: /simoju/public/DashboardController/index");
            exit;
        }

        $this->view('user/dashboard');
    }
}
