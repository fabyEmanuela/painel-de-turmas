<?php

namespace App\Controllers;

use App\Models\Student;
require_once __DIR__ . '/../helpers/view.php';
require_once __DIR__ . '/../../vendor/autoload.php';
class StudentsController
{
    public function index()
    {
        
        view('students', ['students' => (new Student())->getAll()]);
    }
      public function single()
    {
        view('students-edit');
    }
     public function store(){
      header('Content-Type: application/json');

                   $name = $_POST['name_student'] ?? '';
                    $cpf = $_POST['cpf'] ?? '';
                    $email = $_POST['email'] ?? '';
                    $date_birth = $_POST['date_birth'] ?? '';
                    $password_student =  $_POST['password'] ?? '';
     
        $data = [
                    'name_student' => $name,
                    'cpf' => $cpf,
                    'email' => $email ,
                    'date_birth' =>$date_birth,
                    'password_student'=>  $password_student,
                ];
     

        $student = new Student();
        $errors = $student->validateForm($data);

        if (!empty($errors)) {
            echo json_encode([
                'success' => false,
                'errors' => $errors
            ]);
            return;
        }else{
             $result = $student->create($cpf,$name,$date_birth,$email,$password_student);
        echo json_encode([
            'success' => $result,
            'errors' => $result ? 'Cadastro realizado com sucesso!' : 'Erro ao cadastrar'
        ]);
        }
    
      

       

       
    }
    
}
