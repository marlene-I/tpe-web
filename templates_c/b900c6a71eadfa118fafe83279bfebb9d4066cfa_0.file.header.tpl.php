<?php
/* Smarty version 3.1.39, created on 2021-10-12 15:02:15
  from 'C:\xampp\htdocs\WEB II\tpe-web\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_616587578e98d3_51683243',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b900c6a71eadfa118fafe83279bfebb9d4066cfa' => 
    array (
      0 => 'C:\\xampp\\htdocs\\WEB II\\tpe-web\\templates\\header.tpl',
      1 => 1634043716,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_616587578e98d3_51683243 (Smarty_Internal_Template $_smarty_tpl) {
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
    <title>BarApp</title>
</head>
<body>
    <header>
        <nav>
            <div class="contendor-nav">   
                <ul class="navbar navbar-dark bg-dark">
                    </li> <li class="nav-item"><a href="" class="nav-link">Home</a></li>
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
                    <?php if ((isset($_SESSION['USER_ID']))) {?>
                    <li class="nav-item"><a href="admin" class="nav-link">Admin</a></li>
                    <li class="nav-item"><a href="logout" class="nav-link">Cerrar sesión (<?php echo $_SESSION['USER_EMAIL'];?>
)</a></li>
                    <?php } else { ?>
                    <li class="nav-item"><a href="login" class="nav-link">Ingresar</a></li>
                    <li class="nav-item"><a href="registro" class="nav-link">Registro</a></li>
                    <?php }?>
                </ul> 
            </div>
        </nav>
    </header>
    
<?php }
}
