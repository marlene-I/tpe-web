<?php
require_once('model/ProductModel.php');
require_once('view/View.php');
require_once('model/CategoryModel.php');
include_once('helpers/auth.helper.php');
class Controlador
{
    private $productModel;
    private $view;
    private $categoryModel;
    public function __construct(){
        $this->authHelper = new AuthHelper();
        $this->productModel = new ProductModel();
        $this->view = new View();
        $this->categoryModel = new CategoryModel();
  
    }

    function renderHome(){
        $this->authHelper->checkActivity();
        $producto = $this->productModel->getAll();
        $categoria = $this->categoryModel->getAll();
        $this->view->Home($producto, $categoria);
    }

    function filtradoCategorias($categoria){
        $categorias = $this->categoryModel->getAll();
        $filtroCategorias = $this->productModel->filterByCateg($categoria);
        $this->view->Home($filtroCategorias, $categorias);
    }

    function detalleProducto($id){
        $this->authHelper->checkActivity();
        $categorias= $this->categoryModel->getAll();
        $infoProducto = $this->productModel->getProduct($id);
        $nombre = $infoProducto[0]->nombre;
        $categoria = $infoProducto[0]->nombre_categoria;
        $precio = $infoProducto[0]->precio;
        $detalle  = $infoProducto[0]->detalle;
        $this->view->mostrarDetalle($nombre, $categoria, $precio, $detalle, $id, $categorias);
    }
    
    function seccionAdmin(){
        $access_level = "1";
        $this->authHelper->getPermission($access_level);
        $producto = $this->productModel->getAll();
        $categorias = $this->categoryModel->getAll();
        $this->view->admin($categorias, $producto);
    }
    
    function agregar(){
        $access_level = "1";
        $this->authHelper->getPermission($access_level);
        if (isset($_GET['nombre_categoria'])) {
            $categoria = $_GET['nombre_categoria'];
            $this->categoryModel->insert($categoria);
        } else {
            $producto = $_GET['producto'];
            $precio = $_GET['precio'];
            $detalle = $_GET['detalle'];
            $categoria = $_GET['categoria'];
            $this->productModel->insert($producto, $precio, $detalle, $categoria);
        }
        header("Location: " . ADMIN);
    }
    function borrardatos($id){
        $access_level = "1";
        $this->authHelper->getPermission($access_level);
        if (isset($_GET['nombre_categoria'])) {
            $categoria = $_GET['nombre_categoria'];
            $this->categoryModel->delete($categoria);
        }
        $borrar = $this->productModel->delete($id);
        $this->seccionAdmin();
    }
    function modificar($id){
        $access_level = "1";
        $this->authHelper->getPermission($access_level);
        $categorias = $this->categoryModel->getAll();
        $this->view->datos($id, $categorias);
    }
    function confirmform(){
        $access_level = "1";
        $this->authHelper->getPermission($access_level);
        $producto = $_REQUEST['producto'];
        $precio = $_REQUEST['precio'];
        $detalle = $_REQUEST['detalle'];
        $categoria = $_REQUEST['categoria'];
        $id = $_REQUEST['id'];
        $modificar = $this->productModel->modify($producto, $precio, $detalle, $id, $categoria);
        if ($modificar) {
            header("Location: " . ADMIN);
        }
    }

    function showCategorias(){
        $access_level = "1";
        $this->authHelper->getPermission($access_level);
        $categorias = $this->categoryModel->getAll();
        $this->view->mostrarCategorias($categorias);
    }
    function modificarCategorias($id){
        $access_level = "1";
        $this->authHelper->getPermission($access_level);
        $categorias = $this->categoryModel->getAll();
        $this->view->mostrarFormCategorias($id, $categorias);
    }
    function confirmarModificacion(){ //**CHECK nombre funcion */
        $access_level = "1";
        $this->authHelper->getPermission($access_level);
        $newCat = $_REQUEST['categoria'];
        $id = $_REQUEST['id'];
        $this->categoryModel->modify($newCat, $id);
        header("Location: " . ADMIN." /modificarCategorias");
    }
    function borrarCategoria($id){
        $access_level = "1";
        $this->authHelper->getPermission($access_level);
        $this->categoryModel->delete($id);
        header("Location: " . ADMIN." /modificarCategorias");

    }
}
