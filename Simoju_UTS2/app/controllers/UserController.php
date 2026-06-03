<?php

class UserController extends Controller {

    public function index()
    {
        if($_SESSION['role'] != 'admin')
        {
            header(
            "Location: index.php?url=HomeController/dashboard"
            );
            exit;
        }

        $user = $this->model('User');

        $data['users'] =
        $user->getAllUser();

        $this->view(
            'user/index',
            $data
        );
    }
}