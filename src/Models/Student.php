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

    // public function cpfExists($cpf)
    // {
    //     $stmt = $this->pdo->prepare('SELECT id FROM students WHERE cpf = ?');
    //     $stmt->execute([$cpf]);
    //     return $stmt->fetch() !== false;
    // }
    // public function validateName($name)
    // {
    //     return !empty($name) && strlen($name) >= 3;
    // }
    public function validateForm($data)
    {
        $errors = [];
        if (empty($data['name_student']) || strlen($data['name_student']) < 3) {
            $errors[] = 'Nome inválido, deve conter no mínimo 3 caracteres';
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
              

       
        return $errors;
             
    }
  
    public function getAll()
    {
        $stmt = $this->pdo->query('SELECT * FROM students ORDER BY name_student ASC ');
      
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
 
}
