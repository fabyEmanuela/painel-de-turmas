<?php

namespace App\Controllers;

use App\Models\Classes;
require_once __DIR__ . '/../helpers/view.php';
require_once __DIR__ . '/../../vendor/autoload.php';
class ClassesController{
 public function index()
    {
        
 
         view('classes', ['classes' => (new Classes())->getAll()]);
    }
}