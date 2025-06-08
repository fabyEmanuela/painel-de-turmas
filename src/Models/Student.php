<?php 
namespace App\Models;

use PDO;
use PDOException;
use App\Controllers\StudentsController;
class Student
{
    private $pdo;

    public function __construct()
    {
              

          $this->pdo = new PDO('mysql:host=localhost;dbname=fiap_project;charset=utf8', 'root', '');
    }


    public function validateForm($data)
    {
        $errors = [];
        if($data['formType'] == 'edit'){
                   if (empty($data['name_student']) || strlen($data['name_student']) < 3) {
            $errors[] = 'Nome inválido, deve conter no mínimo 3 caracteres';
            }
            if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'E-mail inválido';
            }
      
        // if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $data['password_student'])) {
        //      $errors[] = 'A senha deve ter no mínimo 8 caracteres, com pelo menos uma letra maiúscula, uma letra minúscula, um número e um símbolo.';
        // }

            if (empty($data['cpf']) ||  strlen($data['cpf']) < 14) {
                $errors[] = 'CPF inválido deve conter 11 dígitos';
            }
        
        }else{
            
            if (empty($data['name_student']) || strlen($data['name_student']) < 3) {
                $errors[] = 'Nome inválido, deve conter no mínimo 3 caracteres';
            }
            if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'E-mail inválido';
            } else {
                $stmt = $this->pdo->prepare('SELECT id FROM students WHERE email = ?');
                $stmt->execute([$data['email']]);

                if ($stmt->fetch()) {
                    $errors[] = 'E-mail já cadastrado.';
                }
            }
      
            if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $data['password_student'])) {
                $errors[] = 'A senha deve ter no mínimo 8 caracteres, com pelo menos uma letra maiúscula, uma letra minúscula, um número e um símbolo.';
            }

            if (empty($data['cpf']) ||  strlen($data['cpf']) < 14) {
                $errors[] = 'CPF inválido deve conter 11 dígitos';
            } else {
            
                $stmt = $this->pdo->prepare('SELECT id FROM students WHERE cpf = ?');
                $stmt->execute([$data['cpf']]);

                if ($stmt->fetch()) {
                    $errors[] = 'CPF já cadastrado.';
                }
            }
             
                
        }



 

       
        return $errors;
             
    }
    public function validadePassword(){

    }
  
    public function getAll()
    {
        $stmt = $this->pdo->query('SELECT * FROM students ORDER BY name_student ASC ');
      
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getId($id){

        if (empty($id)) {
            echo json_encode([
                'success' => false,
                'errors' => 'ID inválido ou não informado'
            ]);
            return;
        }
        
         try {
         $stmt = $this->pdo->prepare('SELECT * FROM students WHERE id = ?');
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

           
            return $result ;
        } catch (PDOException $e) {
            return false;
        }

    }

    public function create($cpf,$name,$date_birth,$email,$password_student) 
    {
        $password_hash = password_hash($password_student, PASSWORD_DEFAULT);

        try {
            $stmt = $this->pdo->prepare('INSERT INTO students (cpf, name_student, date_birth, email, password_student ) VALUES (?, ?, ?, ?, ?)');
            return $stmt->execute([$cpf, $name, $date_birth, $email,$password_hash]);
        } catch (PDOException $e) {
            return false;
        }
    }
    public function destroy( $id ){
        // $id = $_POST['id'] ?? '';
        if (empty($id)) {
            echo json_encode([
                'success' => false,
                'errors' => 'ID inválido ou não informado'
            ]);
            return;
        }
        
        try {
            $stmt = $this->pdo->prepare('DELETE FROM students WHERE id = ?');
            $result = $stmt->execute([$id]);
            
            if ($result) {
                echo json_encode([
                    'success' => true,
                    'message' => 'Aluno excluído com sucesso!'
                ]);
            } else {
                echo json_encode([
                    'success' => false,
                    'errors' => 'Erro ao excluir alunos'
                ]);
            }
        } catch (PDOException $e) {
            echo json_encode([
                'success' => false,
                'errors' => $e->getMessage()
            ]);
        }
        
    }
    public function search($term){
       
        $stmt = $this->pdo->prepare('SELECT * FROM students where name_student LIKE ?');
        $stmt->execute(['%' . $term . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    public function update($id, $cpf, $name, $date_birth, $email, $password_student)
    {
        $password_hash = password_hash($password_student, PASSWORD_DEFAULT);
        try {
            $stmt = $this->pdo->prepare('UPDATE students SET cpf = ?, name_student = ?, date_birth = ?, email = ?, password_student = ? WHERE id = ?');
            return $stmt->execute([$cpf, $name, $date_birth, $email, $password_hash, $id]);
        } catch (PDOException $e) {
            return false;
        }
    }
 
}
