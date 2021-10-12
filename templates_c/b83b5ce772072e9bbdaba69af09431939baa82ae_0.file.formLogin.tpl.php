<?php
/* Smarty version 3.1.39, created on 2021-10-12 05:28:22
  from 'C:\xampp\htdocs\WEB II\tpe-web\templates\formLogin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_616500d6326271_45854534',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b83b5ce772072e9bbdaba69af09431939baa82ae' => 
    array (
      0 => 'C:\\xampp\\htdocs\\WEB II\\tpe-web\\templates\\formLogin.tpl',
      1 => 1634009282,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_616500d6326271_45854534 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<form action="login" method="post">
    <input type="text" placeholder="Usuario" name="usuario">
    <input type="password" placeholder="Contraseña" name="password">
    <button type="submit" class="mt-2">Ingresar</button>
</form>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
