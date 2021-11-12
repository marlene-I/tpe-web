<?php
    // **DEL**
    require_once 'model/Model.php';
    require_once 'api/apiView.php';
    //El nombre de la clase debe coincidir con el nombre dado en el router-api.php
    class apiMenuController {
        private $model;
        private $view;

        function __construct(){
            $this->model = new Model();
            $this->view = new apiView();
        }

        function getMenu(){
            $menu = $this->model->obtenerTodosLosDatos();
            //Se debe agregar lista que imprima JSON y devuelva el codigo 200 (o el que corresponda)
            $this->view->response($menu);
            
        }
    }

?>