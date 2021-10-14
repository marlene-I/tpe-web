<?php
require_once('model/Model.php');
require_once('view/View.php');
require_once('model/ModelCateg.php');
include_once('helpers/auth.helper.php');
class Controlador
{
    private $model;
    private $view;
    private $modelCateg;
    public function __construct(){
        $this->authHelper = new AuthHelper();
        $this->model = new Model();
        $this->view = new View();
        $this->modelCateg = new ModelCateg();
  
    }

    function renderHome(){
        $this->authHelper->checkActivity();
        $producto = $this->model->obtenerTodosLosDatos();
        $categoria = $this->modelCateg->obtenerCategorias();
        $this->view->Home($producto, $categoria);
    }

    function filtradoCategorias($categoria){
        $categorias = $this->modelCateg->obtenerCategorias();
        $filtroCategorias = $this->modelCateg->filtrarCategorias($categoria);
        $this->view->Home($filtroCategorias, $categorias);
    }

    function detalleProducto($id){
        $this->authHelper->checkActivity();
        $categorias= $this->modelCateg->obtenerCategorias();
        $infoProducto = $this->model->obtenerInfoProducto($id);
        $nombre = $infoProducto[0]->nombre;
        $categoria = $infoProducto[0]->nombre_categoria;
        $precio = $infoProducto[0]->precio;
        $detalle  = $infoProducto[0]->detalle;
        $this->view->mostrarDetalle($nombre, $categoria, $precio, $detalle,$categorias);
    }
    
    function seccionAdmin(){
        $this->authHelper->checkLogin();
        $this->authHelper->checkActivity();
        $producto = $this->model->obtenerTodosLosDatos();
        $categorias = $this->modelCateg->obtenerCategorias();
        $this->view->admin($categorias, $producto);
    }
    
    function agregar(){
        $this->authHelper->checkLogin();
        $this->authHelper->checkActivity();
        if (isset($_GET['nombre_categoria'])) {
            $categoria = $_GET['nombre_categoria'];
            $this->modelCateg->agregarCategoria($categoria);
        } else {
            $producto = $_GET['producto'];
            $precio = $_GET['precio'];
            $detalle = $_GET['detalle'];
            $categoria = $_GET['categoria'];
            $this->model->agregar($producto, $precio, $detalle, $categoria);
        }
        header("Location: " . ADMIN);
    }
    function borrardatos($id){
        $this->authHelper->checkLogin();
        $this->authHelper->checkActivity();
        if (isset($_GET['nombre_categoria'])) {
            $categoria = $_GET['nombre_categoria'];
            $this->modelCateg->borrarCategoria($categoria);
        }
        $borrar = $this->model->borrar($id);
        $this->seccionAdmin();
    }
    function modificar($id){
        $this->authHelper->checkLogin();
        $this->authHelper->checkActivity();
        $categorias = $this->modelCateg->obtenerCategorias();
        $this->view->datos($id, $categorias);
    }
    function confirmform(){
        $this->authHelper->checkLogin();
        $this->authHelper->checkActivity();
        $producto = $_REQUEST['producto'];
        $precio = $_REQUEST['precio'];
        $detalle = $_REQUEST['detalle'];
        $categoria = $_REQUEST['categoria'];
        $id = $_REQUEST['id'];
        $modificar = $this->model->modificar($producto, $precio, $detalle, $id, $categoria);
        if ($modificar) {
            header("Location: " . ADMIN);
        }
    }

    function showCategorias(){
        $this->authHelper->checkLogin();
        $this->authHelper->checkActivity();
        $categorias = $this->modelCateg->obtenerCategorias();
        $this->view->mostrarCategorias($categorias);
    }
    function modificarCategorias($id){
        $this->authHelper->checkLogin();
        $this->authHelper->checkActivity();
        $categorias = $this->modelCateg->obtenerCategorias();
        $this->view->mostrarFormCategorias($id, $categorias);
    }
    function confirmarModificacion(){
        echo "aca";
        $newCat = $_REQUEST['categoria'];
        $id = $_REQUEST['id'];
        $this->modelCateg->modificarCategoria($newCat, $id);
        header("Location: " . ADMIN." /modificarCategorias");
    }
    function borrarCategoria($id){
        $this->modelCateg->borrarCategoria($id);
        header("Location: " . ADMIN." /modificarCategorias");

    }
}
