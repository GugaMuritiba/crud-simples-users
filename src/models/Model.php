<?php

namespace Root\Html\models;

use Root\Html\database\database;

abstract class Model
{

    protected Database $conn;

    public function __construct()
    {
        $this->conn = new Database();
    }
}
