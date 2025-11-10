<?php

namespace Root\Html\controllers;

use Root\Html\models\Cities;

class CitiesController extends Controller
{

    public Cities $cities;

    public function __construct()
    {
        $this->cities = new Cities();
    }

    public function GetAllCities()
    {
        authController::VerifyLogin();
        $cities = $this->cities->getAllCities();
        return $this->view('cities', ['cities' => $cities]);
    }

    public function index_add_city()
    {
        authController::VerifyLogin();
        $cities = $this->cities->getAllCities();
        return $this->view('add_city', ['cities' => $cities]);
    }

    public function store_city($data)
    {
        authController::VerifyLogin();
        $this->cities->state = $data['state'];
        $this->cities->city = $data['city'];

        if (!isset($data['state']) || !isset($data['city'])) {
            $_SESSION['msg'] = "Dados incompletos!";
            header("Location: /add_city");
            exit();
        }

        $checkCity = $this->cities->getAllNames();
        foreach ($checkCity as $existingCity) {
            if ($data['city'] == $existingCity->city) {
                $_SESSION['msg'] = "Cidade já existe!";
                header("Location: /add_city");
                exit();
            }
        }

        if ($this->cities->createCity()) {
            $_SESSION['msg'] = "Cidade adicionada com sucesso!";
            header("Location: /cities");
            exit();
        } else {
            $_SESSION['msg'] = "Erro ao adicionar cidade!";
            header("Location: /add_city");
            exit();
        }
    }

    public function update_index()
    {
        authController::VerifyLogin();
        $cities = $this->cities->getAllCities();
        $id_city = $_GET['id_city'];
        return $this->view('UpdateCity', ['cities' => $cities, 'id_city' => $id_city]);
    }

    public function updateCity($data)
    {
        authController::VerifyLogin();
        $this->cities->state = $data['state'];
        $this->cities->city = $data['city'];

        if ($this->cities->updateCity($data['id_city'])) {

            $_SESSION['msg'] = "Cidade atualizada com sucesso!";
            header("Location: /cities");
            exit();
        } else {

            $_SESSION['msg'] = "Erro ao atualizar cidade!";
            header("Location: /update_city?id_city=" . $data['id_city']);
            exit();
        };
    }
}
