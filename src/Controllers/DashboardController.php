<?php
namespace App\Controllers;

require_once __DIR__ . '/../helpers/view.php';

class DashboardController
{
    public function index()
    {
      view('home');
   
    }
}
