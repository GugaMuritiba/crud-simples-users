<?php

namespace Root\Html\database;

use PDO;
use PDOException;

class Database extends PDO
{
    private string $host;
    private string $user;
    private string $password;
    private string $database;
    private PDO $conn;

    public function __construct()
    {
        $this->host = getenv('DB_HOST');
        $this->user = getenv('DB_USERNAME');
        $this->password = getenv('DB_PASSWORD');
        $this->database = getenv('DB_DATABASE');
    }

    public function getConnect()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            throw new PDOException("Connection failed: " . $e->getMessage(), $e->getCode());
        }
    }
}
