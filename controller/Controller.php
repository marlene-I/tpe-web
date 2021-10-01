<?php
require_once('model/Model.php');
require_once('view/View.php');
class Controlador{
    private $model;
    private $view;
    public function __construct(){
        $this->model=new Model();
        $this->view = new View(); 
    }
    function renderHome(){
        $producto = $this->model->obtenerDatos();
        $this->view->Home($producto);
    }
}