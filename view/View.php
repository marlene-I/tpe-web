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
        $this->smarty->display('templates/home.tpl');      
    }
    
    function mostrarDetalle($nombre,$categoria,$precio,$detalle,$id_producto,$categorias){
        $this->smarty->assign('categorias',$categorias);
        $this->smarty->assign('nombre', $nombre);
        $this->smarty->assign('categoria', $categoria);
        $this->smarty->assign('precio', $precio);
        $this->smarty->assign('detalle', $detalle);
        $this->smarty->assign('id_producto', $id_producto);
        $this->smarty->display('templates/detalleProd.tpl');
    }

    function admin($categorias, $producto){
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('productos', $producto);
        $this->smarty->display('admin.tpl');
    }

    function datos($id,$categorias){
  
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('id', $id);
        $this->smarty->display('templates/modificarProd.tpl');
    }

    function mostrarCategorias($categorias){
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->display('templates/modificarCategorias.tpl');
    }

    function mostrarFormCategorias($id, $categorias){
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('id',$id);
        $this->smarty->display('templates/mostrarFormCategorias.tpl');
    }
}