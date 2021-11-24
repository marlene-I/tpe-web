<?php
require_once('model/ProductModel.php');
require_once('view/ProductView.php');
require_once('model/CategoryModel.php');
include_once('helpers/auth.helper.php');
class MenuController{

     //Gestiona renderización y navegación por el menu de productos.
     
    private $productModel;
    private $productView;
    private $categoryModel;
    public function __construct(){
        $this->authHelper = new AuthHelper();
        $this->productModel = new ProductModel();
        $this->productView = new ProductView();
        $this->categoryModel = new CategoryModel();
  
    }

    function renderHome(){
        $this->authHelper->checkActivity();
        $product = $this->productModel->getAll();
        $category = $this->categoryModel->getAll();
        $this->productView->renderHome($product, $category);
    }

   
    function renderDetail($id){
        $this->authHelper->checkActivity();
        $categories= $this->categoryModel->getAll();

        $infoProducto = $this->productModel->getProduct($id);

        $name = $infoProducto->nombre;
        $category = $infoProducto->nombre_categoria;
        $price = $infoProducto->precio;
        $detail  = $infoProducto->detalle;
        $img  = $infoProducto->imagen;
        $this->productView->renderDetail($name, $category, $price, $detail, $id,$img, $categories);
    }

    function renderMenu(){
        $this->authHelper->checkActivity();
        $product = $this->productModel->getAll();
        $category = $this->categoryModel->getAll();
        $this->productView->renderMenu($product, $category );
    }

    function filterByCat($category){
        $this->authHelper->checkActivity();
        $categories = $this->categoryModel->getAll();
        $products = $this->productModel->filterByCateg($category);
        $this->productView->renderHome($products, $categories);
    }


    function searchProduct(){ 
        //Busqueda de productos: 
        //Se admite ausencia o presencia de parámetros y se busca coincidencia
        //del string recibido
        $this->authHelper->checkActivity();
        if(isset($_REQUEST['prod-name']) && !empty($_REQUEST['prod-name'])){ //Check producto
            $prodName ='%'.$_REQUEST['prod-name'].'%';
        } else{
            $prodName ='%';
        }
        if(isset($_REQUEST['lowerLim-price']) && !empty($_REQUEST['lowerLim-price']) ){ //Check limite inferior
            $lowerLim = $_REQUEST['lowerLim-price'];

        }else{
            $lowerLim = null;
        }
        if(isset($_REQUEST['upperLim-price']) && !empty($_REQUEST['upperLim-price']) ){ //Check limite superior
            $upperLim = $_REQUEST['upperLim-price'];

        }else{
            $upperLim = null;
        }
        if(isset($_REQUEST['categ-name']) && !empty($_REQUEST['categ-name'])){ //Check categoria
            $categName ='%'.$_REQUEST['categ-name'].'%';
        } else{
            $categName ='%';
        } 
        
        $products = $this->productModel->advancedSearch($lowerLim,$upperLim,$prodName,$categName);
        $category = $this->categoryModel->getAll();

        $this->productView->renderHome($products, $category);
    }

    function renderPaginated($itemsByPage, $actualPage=null){
        if(isset($itemsByPage) && !empty($itemsByPage) && is_numeric($itemsByPage)){
            $itemsByPage = intval($itemsByPage);
            $totalPages = $this->getTotalPages($itemsByPage);

            if(isset($actualPage) && !empty($actualPage) && is_numeric($actualPage)){
                $offset = $itemsByPage * ($actualPage-1);
                $products = $this->productModel->getPage($itemsByPage, $offset);
                $nextPage = $actualPage +1;
                $previousPage = $actualPage -1;
            }else{
                $actualPage =1;
                $products = $this->productModel->getPage($itemsByPage);
                $nextPage = $actualPage +1;
                $previousPage = $actualPage -1;
            }

           $category = $this->categoryModel->getAll();
           $this->productView->renderMenu($products, $category, $totalPages, $actualPage ,$nextPage,$previousPage);
       }else{
        //    $this->errorView->render("Se necesita numero de paginas");
    }

    }

    function getTotalPages($itemsByPage){
            $itemsByPage = intval($itemsByPage);
            $count = $this->productModel->countProducts();
            $totalItems = $count->prod_num;
            $totalItems = intval($totalItems);

            if($totalItems % $itemsByPage == 0){
                $numPages = intdiv($totalItems,$itemsByPage); 
            }else{
                $numPages = intdiv($totalItems,$itemsByPage)+ 1 ; 
            }
            return $numPages;
    }
    
   
    
    
}
