<?php
/* Smarty version 3.1.39, created on 2021-10-11 20:25:31
  from 'C:\xampp\htdocs\WEB II\tpe-web\templates\modificar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6164819b053ed0_95361274',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '755b29118b60682443d80f36564f1bada8ed8255' => 
    array (
      0 => 'C:\\xampp\\htdocs\\WEB II\\tpe-web\\templates\\modificar.tpl',
      1 => 1633976726,
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
function content_6164819b053ed0_95361274 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<form action="confirmar" method="POST">
    <input type="text" class="form-control mt-2"  name="producto" placeholder= "Producto">
    <input type="number" class="form-control mt-2" name="precio" placeholder="Precio">
    <input type="text" class="form-control mt-2" name="detalle" placeholder="Detalle del producto">
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
