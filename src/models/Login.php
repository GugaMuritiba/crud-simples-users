<?php

namespace Root\Html\models;

use Root\Html\models\Model;
use PDO;

class Login extends Model
{
    public int $id_user;
    public string $name_user;
    public string $email_user;
    public string $cpf_user;
    public int $id_city_user;
    public string $birth_user;
    public $date_singup_user;
    public string $password_user;
    public $deleted_user;

    public function __debugInfo()
    {
        return [
            'id_user' => $this->id_user,
            'name_user' => $this->name_user,
            'email_user' => $this->email_user,
            'cpf_user' => $this->cpf_user,
            'id_city_user' => $this->id_city_user,
            'birth_user' => $this->birth_user,
            'date_singup_user' => $this->date_singup_user,
            'password_user' => $this->password_user,
            'deleted_user' => $this->deleted_user,
        ];
    }

    public function setPasswordUser($password_user)
    {
        $this->password_user = $password_user;
    }

    public function getPasswordUser($password_user)
    {
        return $this->password_user;
    }

    public function LoginUser()
    {
        $stmt = $this->conn->getConnect()->prepare("SELECT id_user,name_user, email_user, cpf_user, id_city_user, birth_user, password_user, deleted_user FROM users WHERE email_user = :email_user");
        $stmt->bindParam(':email_user', $this->email_user);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, Login::class);
        return $result;
    }
}
