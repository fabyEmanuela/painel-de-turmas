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
        view('students-create');
    }
     public function store(){
      header('Content-Type: application/json');

        $name = $_POST['name_student'] ?? '';
        $cpf = $_POST['cpf'] ?? '';
        $email = $_POST['email'] ?? '';
        $date_birth = $_POST['date_birth'] ?? '';
        $password_student =  $_POST['password'] ?? '';
        $form =  'create';
        $data = [
                    'name_student' => $name,
                    'cpf' => $cpf,
                    'email' => $email ,
                    'date_birth' =>$date_birth,
                    'password_student'=>  $password_student,
                    'formType' => $form,
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
    public function delete(){
       
        $id = $_POST['id'] ?? ($_GET['id'] ?? '');
        
        if (empty($id)) {
            echo json_encode([
                'success' => false,
                'errors' => 'ID inválido'
            ]);
            return;
        }
        
        $student = new Student();
        $result = $student->destroy( $id);
        
        echo json_encode([
            'success' => $result,
            'errors' => $result ? 'Cadastro excluído com sucesso!' : 'Erro ao excluir cadastro'
        ]);
    }
    public function edit()
    {
        $id = $_GET['id'] ?? '';
        view('studentsEdit', ['student' => (new Student())->getId($id )]);
    }
    public function updateStudent()
    {
        header('Content-Type: application/json');
        $id = $_POST['id'] ?? '';
        $name = $_POST['name_student'] ?? '';
        $cpf = $_POST['cpf'] ?? '';
        $email = $_POST['email'] ?? '';
        $date_birth = $_POST['date_birth'] ?? '';
        $password_student =  $_POST['password'] ?? '';
        $form =  $_POST['formType'] ?? 'create';
        if( empty($id)){
            echo json_encode([
                'success' => false,
                'errors' => 'ID inválido '
            ]);
            return;

        }
        $data = [
                    'id' => $id,
                    'name_student' => $name,
                    'cpf' => $cpf,
                    'email' => $email ,
                    'date_birth' =>$date_birth,
                    'password_student'=>  $password_student,
                    'formType' => $form,
                ];
     

        $student = new Student();
        $errors = $student->validateForm($data);
        if (!empty($errors)) {
            echo json_encode([
                'success' => false,
                'errors' => $errors
            ]);
            return;
        } else {
            $result = $student->update($id, $cpf, $name, $date_birth, $email, $password_student);
            echo json_encode([
                'success' => true,
                'errors' => 'Aluno atualizado com sucesso!'
            ]);
        }
    }

    public function searchStudent(){
        header('Content-Type: application/json');
        $term = $_POST['search'] ?? '';

        if(empty($term)){
            echo json_encode([
                'success' => false,
                'errors' => 'Campo de pesquisa  esta vazio'
            ]);
            return;
        }
        $student = new Student();
        $results = $student->search($term);
        if(empty($results)){
            echo json_encode([
                'success' => false,
                'erros' => $term . ' não encontrado'
            ]);
             return;
        }else{
            echo json_encode([
                'success' => true,
                'data' => $results 
            ]);
          
        }   
          

    }
    
}
