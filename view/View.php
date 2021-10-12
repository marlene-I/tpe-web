<?php
 require_once('libs/Smarty.class.php');
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
    function admin($categorias, $producto){
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('productos', $producto);
        $this->smarty->display('admin.tpl');
    }
    function borrarr($borrar){
        if ($borrar){
            header("Location: " . BASE_URL);
         }
         else {
             echo"error";
         }
    }
    function datos($id,$categorias){
  
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('id', $id);
        $this->smarty->display('templates/modificar.tpl');
    }
    function showLoginForm(){
        $this->smarty->display('templates/formLogin.tpl');  
    }

}