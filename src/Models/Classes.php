<?php 
namespace App\Models;

use PDO;
use PDOException;
use App\Controllers\ClassesController;
class Classes
{
    private $pdo;

    public function __construct()
    {
              

          $this->pdo = new PDO('mysql:host=localhost;dbname=fiap_project;charset=utf8', 'root', '');
    }


    public function validateForm($data)
    {
        $errors = [];
        if (empty($data['name_classes']) || strlen($data['name_classes']) < 3) {
            $errors[] = 'Nome da turma inválido, deve conter no mínimo 3 caracteres';
        }
         if (empty($data['description'])) {
            $errors[] = 'Campos descrição e obrigatorio';
        }        
        return $errors;
             
    }
  
    public function getAll()
    {
        $sql = 'SELECT c.*, COUNT(sc.student_id) AS total_alunos
            FROM classes c
            LEFT JOIN students_classes sc ON sc.class_id = c.id
            GROUP BY c.id
            ORDER BY c.name_classes ASC';
        $stmt = $this->pdo->query($sql);
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
         $stmt = $this->pdo->prepare('SELECT * FROM classes WHERE id = ?');
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

           
            return $result ;
        } catch (PDOException $e) {
            return false;
        }

    }

    public function create($name_classes, $description)
    {
        try {
            $stmt = $this->pdo->prepare('INSERT INTO classes (name_classes, description) VALUES (:name_classes, :description)');
            $stmt->bindParam(':name_classes', $name_classes);
            $stmt->bindParam(':description', $description);
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }
     public function getStudentsClasses($id){
        if (empty($id)) {
            echo json_encode([
                'success' => false,
                'errors' => 'ID inválido ou não informado'
            ]);
            return;
        }
        
        try {
            $stmt = $this->pdo->prepare('
            SELECT s.*
            FROM students_classes sc
            INNER JOIN students s ON s.id = sc.student_id
            WHERE sc.class_id = ?
            ');
            $stmt->execute([$id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }

    }
    public function getStudentsOff($id){
        if (empty($id)) {
            echo json_encode([
                'success' => false,
                'errors' => 'ID inválido ou não informado'
            ]);
            return;
        }
        
        try {
            $stmt = $this->pdo->prepare('
            SELECT s.*
            FROM students s
            WHERE s.id NOT IN (
                SELECT student_id FROM students_classes WHERE class_id = ?
            )
            ');
            $stmt->execute([$id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }
     public function update($id, $name, $description,$students)
    {
        
        try {
            $stmt = $this->pdo->prepare('UPDATE classes SET name_classes = ?, description = ? WHERE id = ?');
            $result = $stmt->execute([$name, $description, $id]);

            if ($result && !empty($students)) {
               
                // $this->removeStudentsFromClass($id);
              
                return $this->addStudentsToClass($id, $students);
            }
            return $result;
        } catch (PDOException $e) {
            return false;
   
        }

    
}
    public function addStudentsToClass($classId, $students)
    {
        try {
            $stmt = $this->pdo->prepare('INSERT INTO students_classes (class_id, student_id) VALUES (?, ?)');
            foreach ($students as $studentId) {
                $stmt->execute([$classId, $studentId]);
            }  
            return true;
        } catch (PDOException $e) {
            return false;
        }   
    }
    public function removeStudentsFromClass($classId)
    {
        try {
            $stmt = $this->pdo->prepare('DELETE FROM students_classes WHERE class_id = ?');
            return $stmt->execute([$classId]);
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
            $this->removeStudentsFromClass($id);
            $stmt = $this->pdo->prepare('DELETE FROM classes WHERE id = ?');
            $result = $stmt->execute([$id]);
            
            if ($result) {
                return [
                    'success' => true,
                    'message' => 'A Turma excluído com sucesso e a relacão de alunos tambem !'
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
}
