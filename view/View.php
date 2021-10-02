<?php
 require_once('libs/Smarty.class.php');
 class View{
    private $smarty;
    function __construct(){
        $this->smarty = new Smarty();

    }
    function Home($producto, $categorias){ 
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('producto', $producto);
        $this->smarty->display('templates/home.tpl');
       
    }
}