<?php
/* Smarty version 3.1.39, created on 2021-10-10 23:55:13
  from 'C:\xampp\htdocs\WEB II\tpe-web\templates\agregar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_616361412e01c9_85604167',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3b164d7e3a78d44d728627c00836c1287472d503' => 
    array (
      0 => 'C:\\xampp\\htdocs\\WEB II\\tpe-web\\templates\\agregar.tpl',
      1 => 1633901345,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:select.tpl' => 1,
  ),
),false)) {
function content_616361412e01c9_85604167 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="agregar">
    <input type="text" placeholder="producto" name="producto">
    <input type="number" placeholder="precio" name="precio">
    <input type="text" placeholder="detalle" name="detalle">
    <?php $_smarty_tpl->_subTemplateRender("file:select.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <button type="submit" class="mt-2">Agregar</button>
</form><?php }
}
