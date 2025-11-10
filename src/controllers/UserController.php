<?php

namespace Root\Html\controllers;

use Root\Html\models\User;
use Root\Html\models\Cities;

class UserController extends Controller
{

    public User $user;
    public Cities $cities;

    public function __construct()
    {
        $this->user = new User();
        $this->cities = new Cities();
    }

    public function index_register()
    {
        $cities = $this->cities->getAllCities();
        return $this->view('Register', ['cities' => $cities]);
    }

    public function GetAllUsers()
    {
        authController::VerifyLogin();
        $users = $this->user->getAllUsers();
        //dd($users);
        return $this->view('Users', ['users' => $users]);
    }

    public function store($data)
    {
        $this->user->name_user = $data['name_user'];
        $this->user->email_user = $data['email_user'];
        $this->user->cpf_user = $data['cpf_user'];
        $this->user->id_city_user = $data['id_city_user'];
        $this->user->birth_user = $data['birth_user'];
        $this->user->setPasswordUser($data['password_user']);

        if ($this->user->createUser()) {

            $user = $this->user->login();
            $_SESSION['id_user'] = $user->id_user;
            $_SESSION['name_user'] = $user->name_user;
            header("Location: /dashboard");
            exit();
        } else {
            $_SESSION['msg'] = "Erro ao cadastrar usuário!";
            header("Location: /register");
            exit();
        }
    }

    public function update_index()
    {
        $this->user->id_user = $_GET['id'];
        $user = $this->user->getUserById();
        $cities = $this->cities->getAllCities();
        //dd($user);
        return $this->view('UpdateUser', ['user' => $user, 'cities' => $cities]);
    }

    public function update()
    {
        //var_dump($_GET);
        //dd($_POST);
        $this->user->id_user = $_POST['id_user'];
        $this->user->name_user = $_POST['name_user'];
        $this->user->email_user = $_POST['email_user'];
        $this->user->id_city_user = intval($_POST['id_city_user']);
        $this->user->cpf_user = $_POST['cpf_user'];
        $this->user->birth_user = $_POST['birth_user'];
        $this->user->password_user = password_hash($_POST['password_user'], PASSWORD_BCRYPT);

        //dd($this->user->id_city_user);

        if ($this->user->updateUser()) {
            $_SESSION['msg'] = "Usuário atualizado com sucesso!";
            $_SESSION['name_user'] = $this->user->name_user;
            header("Location: /users");
            exit();
        } else {
            $_SESSION['msg'] = "Erro ao atualizar usuário!";
            header("Location: /users");
            exit();
        }
    }

    public function delete()
    {
        if ($_GET['id'] == $_SESSION['id_user']) {
            $_SESSION['msg'] = "Você não pode deletar seu próprio usuário.";
            header("Location: /users");
            exit();
        } else if ($this->user->deleteUser($_GET['id'])) {
            $_SESSION['msg'] = "Usuário deletado com sucesso!";
            header("Location: /users");
            exit();
        } else {
            $_SESSION['msg'] = "Não foi possível deletar o usuário!";
            header("Location: /users");
            exit();
        }
    }

    public function reactivate()
    {
        if ($this->user->reactivateUser($_GET['id'])) {
            $_SESSION['msg'] = "Usuário ativado com sucesso!";
            header("Location: /users");
            exit();
        } else {
            $_SESSION['msg'] = "Erro ao reativar!";
            header("Location: /users");
            exit();
        }
    }
}
