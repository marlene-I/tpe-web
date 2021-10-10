<?php
/* Smarty version 3.1.39, created on 2021-10-10 02:50:24
  from 'D:\xampp\htdocs\proyectos\WEB2\tpe-web\templates\agregar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_616238d09b15e8_07586408',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '71410d241e6145aa0e010b4f47f71f08daecf92e' => 
    array (
      0 => 'D:\\xampp\\htdocs\\proyectos\\WEB2\\tpe-web\\templates\\agregar.tpl',
      1 => 1633827022,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:select.tpl' => 1,
  ),
),false)) {
function content_616238d09b15e8_07586408 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="agregar">
    <input type="text" placeholder="producto" name="producto">
    <input type="number" placeholder="precio" name="precio">
    <input type="text" placeholder="detalle" name="detalle">
    <?php $_smarty_tpl->_subTemplateRender("file:select.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <button type="submit" class="mt-2">Agregar</button>
</form><?php }
}
