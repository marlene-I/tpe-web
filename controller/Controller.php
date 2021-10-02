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
        $producto = $this->model->obtenerTodosLosDatos();
        $categoria = $this->model->obtenerSoloCategorias();
     
        $this->view->Home($producto, $categoria);
    }
    function filtradoCategorias($categoria){
        $categorias= $this->model->obtenerSoloCategorias();
        $filtroCategorias = $this->model->filtrarCategorias($categoria);
        $this->view->Home($filtroCategorias, $categorias);
       
    }
}