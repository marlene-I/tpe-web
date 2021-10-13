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
    
    function mostrarDetalle($nombre,$categoria,$precio,$detalle){
        $this->smarty->assign('nombre', $nombre);
        $this->smarty->assign('categoria', $categoria);
        $this->smarty->assign('precio', $precio);
        $this->smarty->assign('detalle', $detalle);
        $this->smarty->display('templates/detalle.tpl');
    }
    function admin($categorias, $producto){
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('productos', $producto);
        $this->smarty->display('admin.tpl');
        /* $this->smarty->display('agregar.tpl'); */
    }
    function datos($id,$categorias){
  
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('id', $id);
        $this->smarty->display('templates/modificar.tpl');
    }
    function mostrarCategorias($categorias){
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->display('templates/modificarCategorias.tpl');
    }
    function mostrarFormCategorias($id){
        $this->smarty->assign('id',$id);
        $this->smarty->display('templates/mostrarFormCategorias.tpl');
    }
    function mostrarFormRegistro($categorias){
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->display('templates/formRegistro.tpl');
    }

}