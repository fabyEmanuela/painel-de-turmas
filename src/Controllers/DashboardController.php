<?php
namespace App\Controllers;

class DashboardController
{
    public function index()
    {
        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ . '/../Views/layouts/menu-bar.php';
        require_once __DIR__ . '/../Views/home.php';
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }
}
