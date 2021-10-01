<?php
/* Smarty version 3.1.39, created on 2021-09-28 07:24:56
  from 'D:\xampp\htdocs\proyectos\WEB2\practico4\ejercicio6\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6152a7286ab505_59759958',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '60353c2be4f2ecc24abc5bbda4d1f1a04756f820' => 
    array (
      0 => 'D:\\xampp\\htdocs\\proyectos\\WEB2\\practico4\\ejercicio6\\templates\\header.tpl',
      1 => 1632806620,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6152a7286ab505_59759958 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo BASE_URL;?>
">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
</head>
<body>
<div class="container">
<h1>Peliculas por género</h1>
    
    <ul>
        <li><a href="genre/Comedy" class="btn btn-outline-success">Comedy</a></li>
        <li><a href="genre/Drama"class="btn btn-outline-success">Drama</a></li>
        <li><a href="genre/Romance"class="btn btn-outline-success">Romance</a></li>
        <li><a href="genre/Animation"class="btn btn-outline-success">Animation</a></li>
        <li><a href="genre/Action"class="btn btn-outline-success">Fantasy</a></li>
    </ul>
    <a href="button" class="btn btn-outline-danger ms-2">Disney</a>

    <form action="agregar" class="mt-2 ms-2">
        <input type="text" name="title" placeholder="title">
        <input type="text" name="genre" placeholder="genre">
        <input type="text" name="studio" placeholder="studio">
        <input type="number" name="anio" placeholder="year">
        <button type="submit">agregar</button>
    </form>
</div>
<?php }
}
