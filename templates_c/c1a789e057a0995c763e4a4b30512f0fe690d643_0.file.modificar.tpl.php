<?php
/* Smarty version 3.1.39, created on 2021-10-10 03:42:03
  from 'D:\xampp\htdocs\proyectos\WEB2\tpe-web\templates\modificar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_616244eb18f7c5_61132037',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c1a789e057a0995c763e4a4b30512f0fe690d643' => 
    array (
      0 => 'D:\\xampp\\htdocs\\proyectos\\WEB2\\tpe-web\\templates\\modificar.tpl',
      1 => 1633830121,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:select.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_616244eb18f7c5_61132037 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<form action="modificar" method="POST">
    <input type="text" class="form-control mt-2"  name="producto" placeholder= "producto">
    <input type="number" class="form-control mt-2" name="precio" placeholder="precio">
    <?php $_smarty_tpl->_subTemplateRender("file:select.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="form-control mt-2 " name="id">
    <a href="listar" class="btn btn-danger mt-2" >cancelar</a>
    <button type="submit" class="btn btn-danger mt-2" >confirmar</button>                 
</form>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
