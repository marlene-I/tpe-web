<?php
    require_once 'libs/Router.php';
    require_once 'api/apiController.php';
    require_once 'api/apiCommentController.php';
    //Creo el objeto router
    $router = new Router();

    // Defino tabla de routeo
        //Revisar nombre de $URL y nombre de $method (pasados por parametros al Router)
    $router->addRoute('menu', 'GET', 'apiMenuController', 'getMenu'); //Borrar
    $router->addRoute('comentarios/productos/:ID', 'GET', 'apiCommentController', 'getAll'); //Es correcto comentario/:ID_producto
    $router->addRoute('comentarios/productos/:ID', 'POST', 'apiCommentController', 'insertComment');

    $resource = $_GET['resource'];
    $method = $_SERVER['REQUEST_METHOD'];
    $router->route($resource, $method);

    
?> 