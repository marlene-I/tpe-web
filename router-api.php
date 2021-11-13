<?php
    require_once 'libs/Router.php';
    require_once 'api/apiController.php';
    require_once 'api/apiCommentController.php';
    //Creo el objeto router
    $router = new Router();

    // Defino tabla de routeo
    $router->addRoute('menu', 'GET', 'apiMenuController', 'getMenu'); //Borrar
    // $router->addRoute('productos/:ID/comentarios', 'GET', 'apiCommentController', 'getAll'); //Es correcto comentario/:ID_producto
    $router->addRoute('comentarios/productos/:ID', 'GET', 'apiCommentController', 'getAll'); //
    //**CHECK** CUAL DE LOS ENDPOINTS ES CORRECTO 'productos/:ID/comentarios  O  'comentarios/productos/:ID'
    $router->addRoute('comentarios/productos/:ID', 'POST', 'apiCommentController', 'insertComment');
    $router->addRoute('productos/:ID_PROD/comentarios/:ID_COMMENT', 'DELETE', 'apiCommentController', 'eraseComment'); //Es correcto comentario/:ID_producto

    $resource = $_GET['resource'];
    $method = $_SERVER['REQUEST_METHOD'];
    $router->route($resource, $method);

    
?> 