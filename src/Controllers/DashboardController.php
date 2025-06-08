<?php
namespace App\Controllers;
use App\Models\Student;
use App\Models\Classes;
require_once __DIR__ . '/../helpers/view.php';

class DashboardController
{
    public function index()
    {
      $totalStudent = count((new Student())->getAll());
      $totalClasses = count((new Classes())->getAll());
      view('home' , ['sumStudent' =>  $totalStudent,'sumClasses' => $totalClasses]);
     
   
    }
}
