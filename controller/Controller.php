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
    function seccionAdmin(){
        $producto = $this->model->obtenerTodosLosDatos();
        $categorias= $this->model->obtenerSoloCategorias();
        $this->view->admin($categorias, $producto);
    }
    function agregar(){
        $producto = $_GET['producto'];
        $precio = $_GET['precio'];
        $detalle = $_GET['detalle'];
        $categoria = $_GET['categoria'];
        var_dump($categoria);
        $this->model->agregar($producto, $precio, $detalle, $categoria);
     
        header("Location: ". BASE_URL); 
    }
    function borrardatos($id){
        $borrar = $this->model->borrar($id);
        $this->view->borrarr($borrar);      
        $this->seccionAdmin();
    }
    function modificar($id){
        $categorias = $this->model->obtenerSoloCategorias();
        $this->view->datos($id, $categorias);
     }
     function confirmform(){
         $producto = $_REQUEST['producto'];
         $precio = $_REQUEST['precio'];
         $detalle = $_REQUEST['detalle'];
         $categoria = $_GET['categoria'];
         $id = $_REQUEST['id_producto'];
         $modificar = $this->model->modificar($nombre, $profesor,$carrera,$id);
         if($modificar){
             header("Location: " . BASE_URL);
         }
     }
}