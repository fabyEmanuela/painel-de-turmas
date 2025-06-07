<?php
namespace App\Controllers;

class StudentsController
{
    public function index()
    {
        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ . '/../Views/layouts/menu-bar.php';
        require_once __DIR__ . '/../Views/students.php';
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }
     public function store(){
      
        // require_once __DIR__ . '/../Views/students-edit.php';
   
     return Controller::view('alunos-editar');
    }
}
