
<?php
require_once('view/ErrorView.php');

class ProductAdminController
{
    //Gestiona ABM de productos y sus categorías(sección administrador de productos)

    private $categoryModel;
    private $productModel;
    private $productView;
    private $errorView;
    private $authHelper;

    public function __construct()
    {
        $this->authHelper = new AuthHelper();
        $this->productModel = new ProductModel();
        $this->productView = new ProductView();
        $this->errorView = new ErrorView();
        $this->categoryModel = new CategoryModel();
    }

    function renderProductAdmin()
    {
        $access_level = "1";
        $this->authHelper->getPermission($access_level);

        $product = $this->productModel->getAll();
        $categories = $this->categoryModel->getAll();

        if ($product) {
            $this->productView->renderProdAdmin($categories, $product);
        } else {
            $this->errorView->render("Error 404");
        }
    }

    //FUNCIONES DE ABM DE PRODUCTOS (y renderización necesaria)

    function insertProd()
    {
        $access_level = "1";
        $this->authHelper->getPermission($access_level);
        if (
            !empty($_REQUEST['producto']) && !empty($_REQUEST['detalle']) &&
            !empty($_REQUEST['categoria']) && !empty($_REQUEST['precio']) &&
            isset($_REQUEST['producto']) && isset($_REQUEST['detalle']) &&
            isset($_REQUEST['categoria']) && isset($_REQUEST['precio'])
        ) {

            $product = $_REQUEST['producto'];
            $price = $_REQUEST['precio'];
            $detail = $_REQUEST['detalle'];
            $category = $_REQUEST['categoria'];


            $pathImg = $this->uploadImage();
            if($pathImg){
                $this->productModel->insert($product, $price, $detail, $category,$pathImg);
            }else{
                $this->productModel->insert($product, $price, $detail, $category);
            }

            header("Location: " . ADMIN);
        } else {

            $this->errorView->render("Ingresos inválidos");
        }
    }
    

    function deleteProd($id)
    {
        $access_level = "1";
        $this->authHelper->getPermission($access_level);

        $product = $this->productModel->getProduct($id);
        $this->deleteImage($id, $product);
        if ($product) {
            $deleted = $this->productModel->delete($id);
            if($deleted){
                header("Location: " . ADMIN);
            }else{
                $this->errorView->render("No fue posible eliminar");
            }
        } else {
            $this->errorView->render("El producto no existe");
        }
    }

    function modifyProd()
    {
        $access_level = "1";
        $this->authHelper->getPermission($access_level);

        if (
            !empty($_REQUEST['producto']) && !empty($_REQUEST['detalle']) &&
            !empty($_REQUEST['categoria']) && !empty($_REQUEST['precio']) && !empty($_REQUEST['id'])
            && isset($_REQUEST['producto']) && isset($_REQUEST['detalle']) &&
            isset($_REQUEST['categoria']) && isset($_REQUEST['precio']) && isset($_REQUEST['id'])
        ) {

            $product = $_REQUEST['producto'];
            $price = $_REQUEST['precio'];
            $detail = $_REQUEST['detalle'];
            $category = $_REQUEST['categoria'];
            $id = $_REQUEST['id'];
            
            $pathImg = $this->uploadImage();
            if($pathImg){
                $modify = $this->productModel->modify($product, $price, $detail, $id, $category,$pathImg);
            }else{
                $modify = $this->productModel->modify($product, $price, $detail, $id, $category);
            }

            if ($modify) {
                header("Location: " . ADMIN);
            } else {
                $this->errorView->render("No se pudo modificar");
            }
        } else {
            $this->errorView->render("Ingresos inválidos");
        } 
    }
    function uploadImage(){ 
        //Chequea el input de imagenes y la carga al servidor (mueve temp a /img/)
        //Retorna el path en caso positivo
        //False en caso negativo
        if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg"
                || $_FILES['imagen']['type'] == "image/png") {
                $image = $_FILES['imagen']['tmp_name'];
                if ($image) {
                    $pathImg = $this->productModel->uploadImage($image);
                    return $pathImg;
                }else{
                    return false;
                }
            }
        }

    function deleteImage($id_product, $product =null){ //Elimina imagen asociada a un producto
        if(!$product){ //Si no recibe producto lo pide a la DB 
            $product = $this->productModel->getProduct($id_product);
        }

        if($product->imagen){ //Si tiene imagen asociada llama a eliminar del servidor con el path asociado
            $path = $product->imagen; 
            $unlinked = $this->productModel->deleteImage($path); 
            if ($unlinked){ //Si la eliminación es exitosa desvincula el path de la DB
                $product = $this->productModel->unbindImage($id_product);
                if($product){
                    header("Location:" .ADMIN);
                }else{
                    return false;
                }
            }else{
                $this->errorView->render("No se pudo eliminar imagen");
            }
        }else{
            $this->errorView->render("El producto no tiene una imagen asociada");
        }
    }
    
    


    function renderModifyProd($id)
    {
        $access_level = "1";
        $this->authHelper->getPermission($access_level);
        $categories = $this->categoryModel->getAll();
        $this->productView->renderModifyProduct($id, $categories);
    }

    //FUNCIONES DE ABM DE CATEGORIAS (y renderización necesaria)


    function insertCateg()
    {
        $access_level = "1";
        $this->authHelper->getPermission($access_level);

        if (!empty($_GET['nombre_categoria']) && isset($_GET['nombre_categoria'])) {

            $category = $_GET['nombre_categoria'];
            $this->categoryModel->insert($category);

            header("Location: " . ADMIN);
        } else {
            $this->errorView->render("Ingreso inválidos");
        }
    }

    function deleteCateg($id)
    {
        $access_level = "1";
        $this->authHelper->getPermission($access_level);

        $category = $this->categoryModel->getCategory($id);

        if ($category) {

            $this->categoryModel->delete($id);

            header("Location: " . ADMIN);
        } else {

            $this->errorView->render("La categoría no existe");
        }
    }

    function modifyCateg()
    {
        $access_level = "1";
        $this->authHelper->getPermission($access_level);
        if (
            !empty($_REQUEST['categoria']) && !empty($_REQUEST['id'])
            && isset($_REQUEST['categoria']) && isset($_REQUEST['id'])
        ) {

            $newCat = $_REQUEST['categoria'];
            $id = $_REQUEST['id'];

            $this->categoryModel->modify($newCat, $id);
            header("Location: " . ADMIN);
        } else {
            $this->errorView->render("Ingreso inválido");
        }
    }

    function renderModifyCateg($id)
    {
        $access_level = "1";
        $this->authHelper->getPermission($access_level);

        $categories = $this->categoryModel->getAll();

        $this->productView->renderCategoriesForm($id, $categories);
    }
}



?>
