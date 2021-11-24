
<?php
    class ProductAdminController {
         //Gestiona ABM de productos y sus categorías(sección administrador de productos)
         
        private $categoryModel;
        private $productModel;
        private $view;
        private $authHelper;

        public function __construct(){
            $this->authHelper = new AuthHelper();
            $this->productModel = new ProductModel();
            $this->view = new View();
            $this->categoryModel = new CategoryModel();
            
        }

        function renderProductAdmin(){ 
            $access_level = "1";
            $this->authHelper->getPermission($access_level);

            $product = $this->productModel->getAll();
            $categories = $this->categoryModel->getAll();
            
            if($product){
                $this->view->sectionAdmin($categories, $product);
            }else{
                $this->renderErrorHelper->renderError("Error 404");
            }
    }

        //FUNCIONES DE ABM DE PRODUCTOS (y renderización necesaria)
        
        function insertProd(){
            $access_level = "1";
            $this->authHelper->getPermission($access_level);
            
            if(!empty($_REQUEST['producto']) && !empty($_REQUEST['detalle']) &&
            !empty($_REQUEST['categoria']) && !empty($_REQUEST['precio']) &&
             isset($_REQUEST['producto']) && isset($_REQUEST['detalle']) &&
            isset($_REQUEST['categoria']) && isset($_REQUEST['precio'])){
                
                $product = $_REQUEST['producto'];
                $price = $_REQUEST['precio'];
                $detail = $_REQUEST['detalle'];
                $category = $_REQUEST['categoria'];
                
                $this->productModel->insert($product, $price, $detail, $category);
                if($_FILES['img']['type'] == "image/jpg" || $_FILES['img']['type'] == "image/jpeg" 
                    || $_FILES['img']['type'] == "image/png" ) {
                    $this->productModel->insert($product, $price, $detail, $category, $_FILES['img']['tmp_name']);
                }
                else {
                    $this->productModel->insert($product, $price, $detail, $category);
                }

                header("Location: " .ADMIN);

            }else {

                $this->renderErrorHelper->renderError("Ingresos inválidos");
            }
        }
        
        function deleteProd($id){
            $access_level = "1";
            $this->authHelper->getPermission($access_level);

            $product = $this->productModel->getProduct($id);

            if ($product) {
                $deleted = $this->productModel->delete($id);
                header("Location: " .ADMIN);

            }else {
                $this->renderErrorHelper->renderError("El producto no existe");
            }

        }

        function modifyProd(){
            $access_level = "1";
            $this->authHelper->getPermission($access_level);

            if(!empty($_REQUEST['producto']) && !empty($_REQUEST['detalle']) &&
            !empty($_REQUEST['categoria']) && !empty($_REQUEST['precio']) && !empty($_REQUEST['id'])
            && isset($_REQUEST['producto']) && isset($_REQUEST['detalle']) &&
            isset($_REQUEST['categoria']) && isset($_REQUEST['precio']) && isset($_REQUEST['id'])){

                $product = $_REQUEST['producto'];
                $price = $_REQUEST['precio'];
                $detail = $_REQUEST['detalle'];
                $category = $_REQUEST['categoria'];
                $id = $_REQUEST['id'];
                
                $modify = $this->productModel->modify($product, $price, $detail, $id, $category);

                if ($modify) {
                    header("Location: " .ADMIN);
                }else{
                    $this->renderErrorHelper->renderError("No se pudo modificar");
                }

            }else{
                $this->renderErrorHelper->renderError("Ingresos inválidos");
            }
        }
        function renderModifyProd($id){
            $access_level = "1";
            $this->authHelper->getPermission($access_level);
            $categories = $this->categoryModel->getAll();
            $this->view->renderModifyProduct($id, $categories);
        }

        //FUNCIONES DE ABM DE CATEGORIAS (y renderización necesaria)


        function insertCateg(){
            $access_level = "1";
            $this->authHelper->getPermission($access_level);

            if (!empty($_GET['nombre_categoria']) && isset($_GET['nombre_categoria'])) {
                
                $category = $_GET['nombre_categoria'];
                $this->categoryModel->insert($category);

                header("Location: " .ADMIN);
            }else{
                $this->renderErrorHelper->render("Ingreso inválidos");
            }
        }
        
        function deleteCateg($id){
            $access_level = "1";
            $this->authHelper->getPermission($access_level);

            $category = $this->categoryModel->getCategory($id);

            if ($category) {

                $this->categoryModel->delete($id);

                header("Location: " .ADMIN);
            }else{

                $this->renderErrorHelper->renderError("La categoría no existe");
            }
        }
    
        function modifyCateg(){
           $access_level = "1";
            $this->authHelper->getPermission($access_level);
            if(!empty($_REQUEST['categoria']) && !empty($_REQUEST['id'])
            && isset($_REQUEST['categoria']) && isset($_REQUEST['id'])){ 

                $newCat = $_REQUEST['categoria'];
                $id = $_REQUEST['id'];

                $this->categoryModel->modify($newCat, $id);
                header("Location: " .ADMIN);
            }else{
                $this->renderErrorHelper->renderError("Ingreso inválido");
            }
        }

        function renderModifyCateg($id){
            $access_level = "1";
            $this->authHelper->getPermission($access_level);

            $categories = $this->categoryModel->getAll();

            $this->view->renderCategoriesForm($id, $categories);
        }
        
    }
    
    

?>
