<?php

namespace Root\Html\controllers;

class authController
{
    public static function VerifyLogin()
    {
        if (empty($_SESSION['id_user'])) {
            $_SESSION['msg'] = "Você não tem acesso a essa página! Faça o login para acessar essa página!";
            header("Location: /login");
            exit();
        }
    }
}
