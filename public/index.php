<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/router/web.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

//dd($uri);

$method = $_SERVER['REQUEST_METHOD'];

$routes[$method][$uri]();
