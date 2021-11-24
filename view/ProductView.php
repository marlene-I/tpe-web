<?php
 require_once('libs/Smarty.class.php');
class ProductView{
    private $smarty;
    function __construct(){
        $this->smarty = new Smarty();
    }

    function renderHome($producto, $categorias){ 
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('productos', $producto);
        $this->smarty->display('templates/section/sectionHome.tpl');      
    }
    
    function renderDetail($nombre,$categoria,$precio,$detalle,$id_producto,$img,$categorias){
        $this->smarty->assign('categorias',$categorias);
        $this->smarty->assign('nombre', $nombre);
        $this->smarty->assign('categoria', $categoria);
        $this->smarty->assign('precio', $precio);
        $this->smarty->assign('detalle', $detalle);
        $this->smarty->assign('id_producto', $id_producto);
        $this->smarty->assign('imagen', $img);
        $this->smarty->display('templates/section/sectionDetail.tpl');
    }
    function renderMenu($producto, $categorias, $totalPages=null){ 
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('productos', $producto);
        $this->smarty->assign('totalPages', $totalPages);
        $this->smarty->display('templates/section/sectionMenu.tpl');      
    }

    function renderProdAdmin($categorias, $producto){
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('productos', $producto);
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