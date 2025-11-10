<?php

namespace Root\Html\models;

use Root\Html\models\Model;
use PDO;

class Cities extends Model
{

    public int $id_city;
    public string $state;
    public string $city;

    public function __debugInfo()
    {
        return [
            'id_city' => $this->id_city,
            'state' => $this->state,
            'city' => $this->city,
        ];
    }

    public function getAllCities()
    {
        $stmt = $this->conn->getConnect()->prepare("SELECT * FROM cities");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, Cities::class);
    }

    public function getAllNames()
    {
        $stmt = $this->conn->getConnect()->prepare("SELECT city FROM cities");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, Cities::class);
    }

    public function getCityById($id_city_user)
    {
        $stmt = $this->conn->getConnect()->prepare("SELECT city FROM cities WHERE id_city = :id_city_user");
        $stmt->bindParam(':id_city_user', $id_city_user);
        $stmt->execute();
        $city = $stmt->fetchAll(PDO::FETCH_CLASS, Cities::class)[0];
        return $city;
    }
    public function getCity($id_city)
    {
        $stmt = $this->conn->getConnect()->prepare("SELECT * FROM cities WHERE id_city = :id_city");
        $stmt->bindParam(':id_city', $id_city);
        $stmt->execute();
        $city = $stmt->fetchAll(PDO::FETCH_CLASS, Cities::class)[0];
        return $city;
    }

    public function createCity()
    {
        $stmt = $this->conn->getConnect()->prepare("INSERT INTO cities (state, city) VALUES (:state, :city)");
        $stmt->bindParam(':state', $this->state);
        $stmt->bindParam(':city', $this->city);
        return $stmt->execute();
    }

    public function updateCity($id_city)
    {
        $stmt = $this->conn->getConnect()->prepare("UPDATE cities SET state = :state, city = :city WHERE id_city = :id_city");
        $stmt->bindParam(':state', $this->state);
        $stmt->bindParam(':city', $this->city);
        $stmt->bindParam(':id_city', $id_city);
        return $stmt->execute();
    }
}
