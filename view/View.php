<?php
 require_once('libs/Smarty.class.php');
 class View{
    private $smarty;
    function __construct(){
        $this->smarty = new Smarty();

    }
    function Home(){
        $this->assign('producto', $producto)
        $this->smarty->display('templates/header.tpl');
    }
 }