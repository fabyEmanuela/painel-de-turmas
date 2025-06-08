<?php

namespace App\Controllers;

use App\Models\Classes;
use App\Models\Student;
require_once __DIR__ . '/../helpers/view.php';
require_once __DIR__ . '/../../vendor/autoload.php';
class ClassesController{
 public function index()
    {
        
         view('classes', ['classes' => (new Classes())->getAll()]);
    }
    public function single()
    {
        
        view('classes-create');
    }
    public function store(){
      header('Content-Type: application/json');  
        $name = $_POST['name_classes'] ?? '';
        $description = $_POST['description'] ?? '';
        $form =  'create';
        $data = [
                    'name_classes' => $name,
                    'description' => $description,
                    'formType' => $form,
                ];
   
        $classes = new Classes();
        $errors = $classes->validateForm($data);
        if (!empty($errors)) {
            echo json_encode([
                'success' => false,
                'errors' => $errors
            ]);
            return;
        }else{
             $result = $classes->create($name,$description);
        echo json_encode([
            'success' => $result,
            'errors' => $result ? 'Cadastro realizado com sucesso!' : 'Erro ao cadastrar'
        ]);
        }
    }
     public function edit()
    {
        $id = $_GET['id'] ?? '';
        view('classesEdit', ['class' => (new Classes())->getId($id ),
            'students' => (new Classes())->getStudentsOff($id),
            'students_classes' => (new Classes())->getStudentsClasses($id)
        ]);
    }
     public function updateClasses()
    {
        header('Content-Type: application/json');
        $id = $_POST['id'] ?? '';
        $name = $_POST['name_classes'] ?? '';
        $description = $_POST['description'] ?? '';
        $students = $_POST['student'] ?? '';
        $form =  'edit';
        if( empty($id)){
            echo json_encode([
                'success' => false,
                'errors' => 'ID inválido '
            ]);
            return;

        }
        $data = [
                    'id' => $id,
                    'name_classes' => $name,
                    'description' => $description,
                    'students' => $students ,
                    
                    'formType' => $form,
                ];
     

        $classes = new Classes();
        $errors = $classes->validateForm($data);
        if (!empty($errors)) {
            echo json_encode([
                'success' => false,
                'errors' => $errors
            ]);
            return;
        } else {
            $result = $classes->update($id, $name, $description,$students);
            echo json_encode([
                'success' => true,
                'errors' => 'Aluno atualizado com sucesso!'
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
        
        $classes = new Classes();
        $result = $classes->destroy( $id);
        
        echo json_encode([
            'success' => $result,
            'errors' => $result ? 'Turma excluído com sucesso!' : 'Erro ao excluir turma'
        ]);
    }

}