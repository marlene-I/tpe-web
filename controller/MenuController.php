<?php
require_once('model/ProductModel.php');
require_once('view/View.php');
require_once('model/CategoryModel.php');
include_once('helpers/auth.helper.php');
class MenuController{
     //Gestiona renderización y navegación por el menu de productos.
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
        $product = $this->productModel->getAll();
        $category = $this->categoryModel->getAll();
        $this->view->Home($product, $category);
    }

    function filterByCat($category){
        $categories = $this->categoryModel->getAll();
        $products = $this->productModel->filterByCateg($category);
        $this->view->Home($products, $categories);
    }

    function renderDetail($id){
        $this->authHelper->checkActivity();
        $categories= $this->categoryModel->getAll();
        $infoProducto = $this->productModel->getProduct($id);
        $nombre = $infoProducto[0]->nombre;
        $category = $infoProducto[0]->nombre_categoria;
        $precio = $infoProducto[0]->precio;
        $detalle  = $infoProducto[0]->detalle;
        $this->view->mostrarDetalle($nombre, $category, $precio, $detalle, $id, $categories);
    }
    
   
    
    
}
