<?php

require_once('controller/Controller.php');
require_once('controller/ControllerIngreso.php');

$controller = new Controlador();
$controllerIngreso = new ControladorIngreso();
$authHelper = new AuthHelper();

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
define('LOGIN', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/login');
define('ADMIN', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/admin');



if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
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
    case 'detalle':
        $controller->detalleProducto($params[1]);
        break;
    case 'admin':
        $controller->seccionAdmin();
        break;
    case 'agregar':
        $controller->agregar();
        break;
    case 'borrar':
        $controller->borrardatos($params[1]);
        break;
    case 'modificar':
        $controller->modificar($params[1]);
        break;
    case 'modificarCategorias':
        var_dump($params);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $controller-> confirmarModificacion($params[1]);
        } else if(isset($params[1])){
            $controller-> modificarCategorias($params[1]);
        }else{
            $controller->showCategorias();
        }
        break;
    case 'confirmar':
        $controller->confirmform();
        break;
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $controllerIngreso->login();
        } else {
            $controllerIngreso->showLogin();
        }
        break;
    case 'logout':
        $authHelper->logout();
        break;

    default:
        echo "404 -Página no encontrada";
        break;
}
