<?php

//use Exception;
use Root\Html\controllers\LoginController;
use Root\Html\controllers\UserController;
use Root\Html\controllers\DashboardController;
use Root\Html\controllers\CitiesController;

function loadRoute(string $controller, string $method, ...$params)
{
    try {
        if (!class_exists($controller)) {
            throw new Exception("Controller $controller não encontrado");
        }

        $controllerInstance = new $controller;

        if (!method_exists($controllerInstance, $method)) {

            throw new Exception("Método $method não foi encontrado no controlador $controller");
        }

        return $controllerInstance->$method(...$params);
    } catch (Exception $e) {
        http_response_code(500);
        echo "500 - Internal Server Error: " . $e->getMessage();
    }
}

$routes = [
    'GET' => [
        '/' => fn() => loadRoute(DashboardController::class, "index"),
        '/login' => fn() => loadRoute(LoginController::class, "index_login"),
        '/logout' => fn() => loadRoute(LoginController::class, "logout"),
        '/dashboard' => fn() => loadRoute(DashboardController::class, "index_dashboard"),
        '/register' => fn() => loadRoute(UserController::class, "index_register"),
        '/users' => fn() => loadRoute(UserController::class, "GetAllUsers"),
        '/update_user' => fn() => loadRoute(UserController::class, "update_index", $_GET['id']),
        '/delete_user' => fn() => loadRoute(UserController::class, "delete", $_GET['id']),
        '/reactivate_user' => fn() => loadRoute(UserController::class, "reactivate", $_GET['id']),
        '/cities' => fn() => loadRoute(CitiesController::class, "GetAllCities"),
        '/add_city' => fn() => loadRoute(CitiesController::class, "index_add_city"),
        '/update_city' => fn() => loadRoute(CitiesController::class, "update_index", $_GET['id_city']),
    ],
    'POST' => [
        '/store' => fn() => loadRoute(UserController::class, "store", $_POST),
        '/login' => fn() => loadRoute(LoginController::class, "login", $_POST),
        '/update' => fn() => loadRoute(UserController::class, "update", $_POST),
        '/store_city' => fn() => loadRoute(CitiesController::class, "store_city", $_POST),
        '/update_city' => fn() => loadRoute(CitiesController::class, "updateCity", $_POST),
    ],
];
