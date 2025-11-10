<?php

namespace Root\Html\controllers;

class DashboardController extends Controller
{

    public function index()
    {
        return $this->view('Index');
    }

    public function index_dashboard()
    {
        authController::VerifyLogin();
        return $this->view('Dashboard');
    }

    public function index_cities()
    {
        authController::VerifyLogin();
        return $this->view('cities');
    }

    public function index_jobs()
    {
        authController::VerifyLogin();
        return $this->view('jobs');
    }
}
