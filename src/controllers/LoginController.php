<?php

namespace Root\Html\controllers;

use Root\Html\models\User;
use Root\Html\models\Login;

class LoginController extends Controller
{

    public User $user;
    public Login $login;

    public function __construct()
    {
        $this->user = new User();
        $this->login = new Login();
    }

    public function index_login()
    {
        return $this->view('Login');
    }
    public function index_dashboard()
    {
        return $this->view('Dashboard');
    }

    public function login($data)
    {
        $this->login->email_user = $data['email_user'];
        $this->login->setPasswordUser($data['password_user']);

        if (!empty($this->login->LoginUser())) {

            $result = $this->login->LoginUser()[0];

            if ($data['email_user'] === $result->email_user && password_verify($data['password_user'], $result->password_user) && $result->deleted_user === 0) {

                $_SESSION['id_user'] = $result->id_user;
                $_SESSION['name_user'] = $result->name_user;
                header("Location: /dashboard");
                exit();
            } else if ($result->deleted_user === 1) {
                $_SESSION['msg'] = "Usuário desativado!";
                header("Location: /login");
                exit();
            } else {
                $_SESSION['msg'] = "Senha inválida!";
                header("Location: /login");
                exit();
            }
        } else {
            $_SESSION['msg'] = "Email inválido!";
            header("Location: /login");
            exit();
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header("Location: /login");
        exit();
    }
}
