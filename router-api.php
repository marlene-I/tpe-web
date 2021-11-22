<?php
    require_once 'libs/Router.php';
    require_once 'api/apiCommentController.php';
    //Creo el objeto router
    $router = new Router();

    define('DENIED_ACCESS', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/acceso-denegado');
    define('LOGIN', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/login');

    // Defino tabla de routeo
    $router->addRoute('comentarios/productos/:ID', 'GET', 'apiCommentController', 'getAll'); //
    $router->addRoute('comentarios/productos/:ID', 'POST', 'apiCommentController', 'insertComment');
    $router->addRoute('comentarios/:ID_COMMENT', 'DELETE', 'apiCommentController', 'eraseComment');

    $resource = $_GET['resource'];
    $method = $_SERVER['REQUEST_METHOD'];
    $router->route($resource, $method);

    
?> 