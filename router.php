<?php

require_once('controller/MenuController.php');
require_once('controller/UserAdminController.php');
require_once('controller/ProductAdminController.php');

//Controladores: 
$productAdminController = new ProductAdminController();
$userAdminController = new UserAdminController();
$menuController = new MenuController();
$authHelper = new AuthHelper();

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
define('LOGIN', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/login');
define('ADMIN', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/admin');
define('USERS', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/usuarios');
define('DENIED_ACCESS', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/acceso-denegado');



if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home';
}
$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        $menuController->renderHome();
    break;
    case 'nombre_categoria':
        $menuController->filterByCat($params[1]);
    break;
    case 'detalle':
        $menuController->renderDetail($params[1]);
    break;
    case 'admin':
        $productAdminController->renderProductAdmin();
    break;
    case 'usuarios':
        $userAdminController->renderUsersAdmin();
    break;
    case 'cambiarRol':
        $userAdminController->modifyUserRole();
    break;
    case 'borrarUsuario':
        $userAdminController->deleteUser($params[1]);
    break;
    case 'registro':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userAdminController->createUser();
        } else {
            $userAdminController->renderRegister();
        }
    break;
    case 'agregar-producto':
        $productAdminController->insertProd();

    break;
    case 'agregar-categoria':
        $productAdminController->insertCateg();

    break;
    case 'borrar':
        $productAdminController->deleteProd($params[1]); 
    break;
    case 'modificar':
            $productAdminController->renderModifyProd($params[1]);
    break;
    case 'modificarCategorias':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $productAdminController->modifyCateg();
        } else if (isset($params[1])) {
            $productAdminController->renderModifyCateg($params[1]);
        }
    break;
    case 'borrarCategoria':
        $productAdminController->deleteCateg($params[1]);
    break;
    case 'confirmar':
        $productAdminController->modifyProd();
    break;
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userAdminController->login();
        } else {
            $userAdminController->renderLogin();
        }
    break;
    case 'logout':
        $userAdminController->logout();
    break;
    case 'acceso-denegado':
        $userAdminController->renderDeniedAccess();
    break;
    default:
        echo "404 -Página no encontrada";
    break;
}
