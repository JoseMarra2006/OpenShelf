<?php 
    session_start();
    require_once('db.openshelf.php');

    spl_autoload_register(function ($class) {
        $file = 'models/' . $class . '.php';
        if (file_exists($file)) {
            require $file;
        }
    });
    
    $page = substr($_SERVER['REQUEST_URI'], 1);  
    $routes = explode('/', $page);
        
    $resource = empty($routes[0]) ? 'main-page' : $routes[0];

    $action = $routes[1] ?? 'list';

    $controller = "controllers/$resource.controller.php";

    if(file_exists($controller)){
        require($controller);
    } else {
        require("controllers/404.controller.php");
    }
?>