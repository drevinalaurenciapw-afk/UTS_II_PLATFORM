<?php

class UserMiddleware
{
    public static function check()
    {
        if(!isset($_SESSION['user_id']))
        {
            header("Location: ../AuthController/login");
            exit;
        }
    }
}