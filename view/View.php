<?php
 require_once('libs/Smarty.class.php');
 require_once('helpers/auth.helper.php');
class View{
    private $smarty;
    function __construct(){
        $this->smarty = new Smarty();
    }

    function Home($producto, $categorias){ 
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('productos', $producto);
        $this->smarty->display('templates/section/sectionHome.tpl');      
    }
    
    function mostrarDetalle($nombre,$categoria,$precio,$detalle,$id_producto,$categorias){
        $this->smarty->assign('categorias',$categorias);
        $this->smarty->assign('nombre', $nombre);
        $this->smarty->assign('categoria', $categoria);
        $this->smarty->assign('precio', $precio);
        $this->smarty->assign('detalle', $detalle);
        $this->smarty->assign('id_producto', $id_producto);
        $this->smarty->display('templates/section/sectionDetail.tpl');
    }

    function sectionAdmin($categorias, $producto){
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('productos', $producto);
        $this->smarty->display('templates/section/sectionProductsAdmin.tpl');
    }

    function renderModifyProduct($id,$categorias){
  
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('id', $id);
        $this->smarty->display('templates/form/formModifyProd.tpl');
    }

    function mostrarFormCategorias($id, $categorias){
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('id',$id);
        $this->smarty->display('templates/form/formModifyCategory.tpl');
    }
}