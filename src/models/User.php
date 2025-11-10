<?php

namespace Root\Html\models;

require_once __DIR__ . '/../../vendor/autoload.php';

use Root\Html\models\Model;

use PDO;
use PDOException;
use Exception;

class User extends Model
{
    public int $id_user;
    public string $name_user;
    public string $email_user;
    public string $cpf_user;
    public int $id_city_user;
    public string $birth_user;
    public $date_signup_user;
    public string $password_user;
    public $deleted_user;
    public string $city;

    public function __debugInfo()
    {
        return [
            'id_user' => $this->id_user,
            'name_user' => $this->name_user,
            'email_user' => $this->email_user,
            'cpf_user' => $this->cpf_user,
            'id_city_user' => $this->id_city_user,
            'birth_user' => $this->birth_user,
            'date_singup_user' => $this->date_signup_user,
            'password_user' => $this->password_user,
            'deleted_user' => $this->deleted_user,
            'city' => $this->city,
        ];
    }


    public function setPasswordUser($password_user)
    {
        $this->password_user = password_hash($password_user, PASSWORD_BCRYPT);
    }

    public function getPasswordUser($password_user)
    {
        return $this->password_user;
    }

    public function createUser()
    {
        //dd($this->user);
        $stmt = $this->conn->getConnect()->prepare("INSERT INTO users (name_user, email_user, cpf_user, id_city_user ,birth_user, password_user) VALUES (:name_user, :email_user, :cpf_user, :id_city_user, :birth_user, :password_user)");
        $stmt->bindParam(':name_user', $this->name_user);
        $stmt->bindParam(':email_user', $this->email_user);
        $stmt->bindParam(':cpf_user', $this->cpf_user);
        $stmt->bindParam(':id_city_user', $this->id_city_user);
        $stmt->bindParam(':birth_user', $this->birth_user);
        $stmt->bindParam(':password_user', $this->password_user);
        return $stmt->execute();
    }

    public function login()
    {
        $stmt = $this->conn->getConnect()->prepare("SELECT * FROM users WHERE email_user = :email_user");
        $stmt->bindParam(':email_user', $this->email_user);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, User::class)[0];
    }

    public function updateUser()
    {
        $stmt = $this->conn->getConnect()->prepare("UPDATE users SET name_user = :name_user, email_user = :email_user, id_city_user = :id_city_user , cpf_user = :cpf_user, birth_user = :birth_user, password_user = :password_user WHERE id_user = :id_user");
        $stmt->bindParam(':name_user', $this->name_user);
        $stmt->bindParam(':email_user', $this->email_user);
        $stmt->bindParam(':cpf_user', $this->cpf_user);
        $stmt->bindParam(':id_city_user', $this->id_city_user);
        $stmt->bindParam(':birth_user', $this->birth_user);
        $stmt->bindParam(':password_user', $this->password_user);
        $stmt->bindParam(':id_user', $this->id_user);
        return $stmt->execute();
    }

    public function deleteUser($id_user)
    {
        $stmt = $this->conn->getConnect()->prepare("UPDATE users SET deleted_user = true WHERE id_user = :id_user");
        $stmt->bindParam(':id_user', $id_user);
        return $stmt->execute();
    }

    public function reactivateUser($id_user)
    {
        $stmt = $this->conn->getConnect()->prepare("UPDATE users SET deleted_user = false WHERE id_user = :id_user");
        $stmt->bindParam(':id_user', $id_user);
        return $stmt->execute();
    }

    public function getAllUsers()
    {

        try {
            $query = "SELECT u.id_user, u.name_user, u.email_user, u.cpf_user, u.birth_user,u.id_city_user,  u.date_signup_user, u.password_user, u.deleted_user
            , c.city FROM users u INNER JOIN cities c ON u.id_city_user = c.id_city";
            $stmt = $this->conn->getConnect()->query($query);
            $stmt->execute();
            $users = $stmt->fetchAll(PDO::FETCH_CLASS, User::class);
            //dd($users);
            if (!$users) {
                throw new Exception("User not found");
            }
            return $users;
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    public function getUserById()
    {
        try {
            $query = "SELECT u.id_user, u.name_user, u.email_user, u.cpf_user, u.birth_user,u.id_city_user, u.password_user, c.city 
            FROM users u INNER JOIN cities c ON u.id_city_user = c.id_city WHERE u.id_user = :id_user";
            $stmt = $this->conn->getConnect()->prepare($query);
            $stmt->bindParam(':id_user', $this->id_user);
            $stmt->execute();
            $user = $stmt->fetchAll(PDO::FETCH_CLASS, User::class)[0];
            //dd($user);
            if (!$user) {
                throw new Exception("User not found");
            }
            return $user;
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }
}
