<?php




require_once __DIR__ . '/../../vendor/autoload.php';
use App\Controllers\StudentsController;


$controller = new StudentsController();
$controller->store();

?>