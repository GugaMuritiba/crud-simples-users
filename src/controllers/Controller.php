<?php

namespace Root\Html\controllers;

abstract class Controller
{
    public function view(string $view, array $data = [])
    {
        $viewpath = dirname(__DIR__, 1) . "/views/" . $view . ".php";
        require $viewpath;
    }

    // public function model(string $model, array $data = [])
    // {
    //     $modelpath = dirname(__DIR__, 1) . "/models/" . $model . ".php";
    //     require $modelpath;
    // }
}
