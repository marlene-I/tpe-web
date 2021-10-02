<?php

require_once('controller/Controller.php');

$controller = new Controlador();


define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

if (!empty($_GET['action'])){
    $action = $_GET['action'];
} else{
    $action = 'home';
}
$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        $controller->renderHome(); 
        
    break;
    case 'nombre_categoria':
       $controller->filtradoCategorias($params[1]);
    break;
    default:
        # code...
    break;
}