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
        $this->view->renderHome($product, $category);
    }

    function filterByCat($category){
        $categories = $this->categoryModel->getAll();
        $products = $this->productModel->filterByCateg($category);
        $this->view->renderHome($products, $categories);
    }

    function renderDetail($id){
        $this->authHelper->checkActivity();
        $categories= $this->categoryModel->getAll();

        $infoProducto = $this->productModel->getProduct($id);
        $name = $infoProducto[0]->nombre;
        $category = $infoProducto[0]->nombre_categoria;
        $price = $infoProducto[0]->precio;
        $detail  = $infoProducto[0]->detalle;
        $this->view->renderDetail($name, $category, $price, $detail, $id, $categories);
    }

    function searchProduct(){
        if(isset($_REQUEST['prod-name']) && !empty($_REQUEST['prod-name'])){
            $prodName ='%'.$_REQUEST['prod-name'].'%';
        } else{
            $prodName ='%';
        }
        if(isset($_REQUEST['lowerLim-price']) && !empty($_REQUEST['lowerLim-price']) ){
            $lowerLim = $_REQUEST['lowerLim-price'];


        }else{
            $lowerLim = null;
        }
        if(isset($_REQUEST['upperLim-price']) && !empty($_REQUEST['upperLim-price']) ){
            $upperLim = $_REQUEST['upperLim-price'];

        }else{
            $upperLim = null;
        }
        if(isset($_REQUEST['categ-name']) && !empty($_REQUEST['categ-name'])){
            $categName ='%'.$_REQUEST['categ-name'].'%';
        } else{
            $categName ='%';
        } 
        
        $products = $this->productModel->advancedSearch($lowerLim,$upperLim,$prodName,$categName);
        $category = $this->categoryModel->getAll();

        $this->view->renderHome($products, $category);
    }
    
   
    
    
}
