<?php
namespace App\Routes;
use App\Helpers\Request;
use App\Helpers\Uri;
use Exception;

class Router{
  public const CONTROLLER_NAMESPACE = 'App\\controllers';

    public static function load(string $controller, string $method)
    {
        try {
            // verificar se o controller existe
            $controllerNamespace = self::CONTROLLER_NAMESPACE . '\\' . $controller;
            if (!class_exists($controllerNamespace)) {
                throw new Exception("O Controller {$controller} não existe");
            }

            $controllerInstance = new $controllerNamespace;

            if (!method_exists($controllerInstance, $method)) {
                throw new Exception("O método {$method} não existe no Controller {$controller}");
            }

            $controllerInstance->$method((object)$_REQUEST);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
  public static function routes():array
  {
    return  [
      'get' => [
          '/' =>  fn() => self::load('DashboardController','index'),
           // '/alunos' =>  fn() => self::load('StudentsController', 'index'),  
           '/alunos' =>  fn() => self::load('StudentsController', 'index'),  
          '/alunos-cadastros' =>  fn() =>self::load('StudentsController', 'single'), 
          '/turmas' =>  fn() => self::load('ClassesController', 'index'), 
           '/alunos-editar' =>  fn() => self::load('StudentsController', 'edit'), 
          // '/alunos-editar' =>  fn() =>self::load('StudentsController', 'store'),
         
    
      ],
      
      'post' => [
        
          '/alunos-destroy' =>  fn() => self::load('StudentsController', 'delete'),
          '/alunos-search' =>  fn() => self::load('StudentsController', 'searchStudent'),
      ],
      
      
    ];

  }
 public static function execute(){
    try{
      $routes = self::routes();
      $request = Request::get();
      $uri = Uri::get('path');
      if (!isset($routes[$request])) {
          throw new Exception('A rota não existe');
      }
      if (!array_key_exists($uri, $routes[$request])) {
          throw new Exception('A rota não existe');
      }
      $router = $routes[$request][$uri];
      if (!is_callable($router)) {
          throw new Exception("Route {$uri} is not callable");
      }
      $router();
    }catch(t $e){
      echo $e->getMessage();
    }
 }
}

 