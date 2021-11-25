<?php
 require_once('libs/Smarty.class.php');
class ProductView{
    private $smarty;
    function __construct(){
        $this->smarty = new Smarty();
    }

    function renderHome($producto, $categorias,$empty = null){ 
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('productos', $producto);
        $this->smarty->assign('no_products', $empty);
        $this->smarty->display('templates/section/sectionHome.tpl');      
    }
    
    function renderDetail($productAttributes,$id_product ,$categories){
        $this->smarty->assign('categorias',$categories);
        $this->smarty->assign('infoProducto', $productAttributes);
        $this->smarty->assign('id_producto', $id_product);
        $this->smarty->display('templates/section/sectionDetail.tpl');
    }
    function renderMenu($producto, $categorias, $totalPages=null,$actualPage=1, $nextPage =null,$previousPage=null){ 
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('productos', $producto);
        $this->smarty->assign('totalPages', $totalPages);
        $this->smarty->assign('actualPage', $actualPage);
        $this->smarty->assign('nextPage', $nextPage);
        $this->smarty->assign('previousPage', $previousPage);
        $this->smarty->display('templates/section/sectionMenu.tpl');      
    }

    function renderProdAdmin($categorias, $producto, $empty=null){
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('productos', $producto);
        $this->smarty->assign('no_products', $empty);
        $this->smarty->display('templates/section/sectionProductsAdmin.tpl');
    }

    function renderModifyProduct($id,$categorias){
  
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('id', $id);
        $this->smarty->display('templates/form/formModifyProd.tpl');
    }

    function renderCategoriesForm($id, $categorias){
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('id',$id);
        $this->smarty->display('templates/form/formModifyCategory.tpl');
    }

    
}