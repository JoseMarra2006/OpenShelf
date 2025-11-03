<?php 
    session_start();

    require_once __DIR__ . '/vendor/autoload.php';
    require_once('db.openshelf.php');

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