<?php
/* Smarty version 3.1.39, created on 2021-10-02 23:37:30
  from 'D:\xampp\htdocs\proyectos\WEB2\tpe-web\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6158d11a65f065_51775628',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1b841e700d6add7e8ee2a5b14a15e74fdab1af72' => 
    array (
      0 => 'D:\\xampp\\htdocs\\proyectos\\WEB2\\tpe-web\\templates\\header.tpl',
      1 => 1633210647,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6158d11a65f065_51775628 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo BASE_URL;?>
">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <nav>
            <div class="contendor-nav">   
                <ul class="navbar navbar-dark bg-dark">
                    </li> <li class="nav-item"><a href="" class="nav-link">Home</a> </li>
                    <li class="nav-item"><a href="" class="nav-link">Menu</a></li>
                    <li class="nav-item"><a href="" class="nav-link">Categorias</a>
                        <ul class="submenu-categorias">
                           <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categorias']->value, 'categoria');
$_smarty_tpl->tpl_vars['categoria']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['categoria']->value) {
$_smarty_tpl->tpl_vars['categoria']->do_else = false;
?>
                            <li class="nav-item"><a href="nombre_categoria/<?php echo $_smarty_tpl->tpl_vars['categoria']->value->nombre;?>
" class="nav-link"><?php echo $_smarty_tpl->tpl_vars['categoria']->value->nombre;?>
</a></li>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                        </ul>
                  
                    <li class="nav-item"><a href="" class="nav-link">Login</a></li>
                </ul> 
            </div>
        </nav>
    </header>
    
<?php }
}
