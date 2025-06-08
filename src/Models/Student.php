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

    // public function validateFormold($data)
    // {
    //     $errors = [];
    //     if($data['formType'] == 'edit'){
    //                if (empty($data['name_student']) || strlen($data['name_student']) < 3) {
    //         $errors[] = 'Nome inválido, deve conter no mínimo 3 caracteres';
    //         }
    //         if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    //             $errors[] = 'E-mail inválido';
    //         }
      
    //         if (!empty($data['password_student'])) {
    //             if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $data['password_student'])) {
    //                 $errors[] = 'A senha deve ter no mínimo 8 caracteres, com pelo menos uma letra maiúscula, uma letra minúscula, um número e um símbolo.';
    //             }
    //         }
    //         if (!empty($data['cpf'])) {
    //             if (empty($data['cpf']) ||  strlen($data['cpf']) < 14) {
    //                 $errors[] = 'CPF inválido deve conter 11 dígitos';
    //             } else {
                
    //                 $stmt = $this->pdo->prepare('SELECT id FROM students WHERE cpf = ?');
    //                 $stmt->execute([$data['cpf']]);

    //                 if ($stmt->fetch()) {
    //                     $errors[] = 'CPF já cadastrado.';
    //                 }
    //             }
    //         }
        
    //     }else{
            
    //         if (empty($data['name_student']) || strlen($data['name_student']) < 3) {
    //             $errors[] = 'Nome inválido, deve conter no mínimo 3 caracteres';
    //         }
    //         if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    //             $errors[] = 'E-mail inválido';
    //         } else {
    //             $stmt = $this->pdo->prepare('SELECT id FROM students WHERE email = ?');
    //             $stmt->execute([$data['email']]);

    //             if ($stmt->fetch()) {
    //                 $errors[] = 'E-mail já cadastrado.';
    //             }
    //         }
      
    //         if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $data['password_student'])) {
    //             $errors[] = 'A senha deve ter no mínimo 8 caracteres, com pelo menos uma letra maiúscula, uma letra minúscula, um número e um símbolo.';
    //         }

    //         if (empty($data['cpf']) ||  strlen($data['cpf']) < 14) {
    //             $errors[] = 'CPF inválido deve conter 11 dígitos';
    //         } else {
            
    //             $stmt = $this->pdo->prepare('SELECT id FROM students WHERE cpf = ?');
    //             $stmt->execute([$data['cpf']]);

    //             if ($stmt->fetch()) {
    //                 $errors[] = 'CPF já cadastrado.';
    //             }
    //         }
             
                
    //     }
       
    //     return $errors;
             
    // }
  
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
                return [
                    'success' => true,
                    'message' => 'Aluno excluído com sucesso!'
                ];
            } else {
                return [
                    'success' => false,
                    'errors' => 'Falha ao excluir o aluno.'
                ];
            }
        } catch (PDOException $e) {
            return [
                'success' => false,
                'errors' => $e->getMessage()
            ];
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
    public function countAll()
    {
        $stmt = $this->pdo->query('SELECT COUNT(*) as total FROM classes');
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
   //validadores 
    public function validateForm($data){
        $this->errors = [];
        $formType = $data['formType'] ;

        $this->validateName($data['name_student'] ?? '');
        $this->validateEmail($data['email'] ?? '', $formType, $data['id'] ?? null);
        if ($formType === 'edit' && !empty($data['password_student'])) {
            $this->validatePassword($data['password_student']);
        } elseif ($formType === 'create') {
            $this->validatePassword($data['password_student'] ?? '');
        }
        if (isset($data['cpf'])) {
            $this->validateCPF($data['cpf'], $formType, $data['id'] ?? null);
        }
        return $this->errors;
    }

    private function validateName(string $name): void {
        $name = trim($name);
        if (empty($name)) {
            $this->errors[] = 'O nome é obrigatório';
        } elseif (strlen($name) < 3) {
            $this->errors[] = 'O nome deve ter pelo menos 3 caracteres';
        }
    }

    private function validateEmail(string $email, string $formType, ?int $excludeId = null): void {
        $email = trim($email);
        if (empty($email)) {
            $this->errors[] = 'O e-mail é obrigatório';
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = 'Formato de e-mail inválido';
            return;
        }
        $sql = 'SELECT id FROM students WHERE email = ?';
        $params = [$email];
        
        if ($formType === 'edit' && $excludeId !== null) {
            $sql .= ' AND id != ?';
            $params[] = $excludeId;
        }
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        
        if ($stmt->fetch()) {
            $this->errors[] = 'Este e-mail já está cadastrado';
        }
    }

    private function validatePassword(string $password): void {
        if (strlen($password) < 8) {
            $this->errors[] = 'A senha deve ter no mínimo 8 caracteres';
        }
        if (!preg_match('/[A-Z]/', $password)) {
            $this->errors[] = 'A senha deve conter pelo menos uma letra maiúscula';
        }
        if (!preg_match('/[a-z]/', $password)) {
            $this->errors[] = 'A senha deve conter pelo menos uma letra minúscula';
        }
        if (!preg_match('/[0-9]/', $password)) {
            $this->errors[] = 'A senha deve conter pelo menos um número';
        }
        if (!preg_match('/[\W_]/', $password)) {
            $this->errors[] = 'A senha deve conter pelo menos um símbolo';
        }
    }

    private function validateCPF(string $cpf, string $formType, ?int $excludeId = null): void {   
        if (strlen($cpf) != 14) {
            $this->errors[] = 'CPF deve conter exatamente 11 dígitos numéricos';
            return;
        }
        if(preg_match('/^(\d)(?:\1|\.|\-){10}$/',$cpf)){
            $this->errors[] = 'CPF inválido dígitos são iguais';
            return;
        }   
        // Verifica se o CPF já existe 
        $sql = 'SELECT id FROM students WHERE cpf = ?';
        $params = [$cpf];
        
        if ($formType === 'edit' && $excludeId !== null) {
            $sql .= ' AND id != ?';
            $params[] = $excludeId;
        }
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        
        if ($stmt->fetch()) {
            $this->errors[] = 'Este CPF já está cadastrado';
        }
    }
 
}
