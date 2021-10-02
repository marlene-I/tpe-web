<?php
/* Smarty version 3.1.39, created on 2021-10-02 01:41:09
  from 'D:\xampp\htdocs\proyectos\WEB2\tpe-web\templates\categoria.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61579c955f9fa9_25455118',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ade1c831eb2b0fe89098ba1b458d6e0cde3e2dd6' => 
    array (
      0 => 'D:\\xampp\\htdocs\\proyectos\\WEB2\\tpe-web\\templates\\categoria.tpl',
      1 => 1633131667,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61579c955f9fa9_25455118 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categoria']->value, 'categorias');
$_smarty_tpl->tpl_vars['categorias']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['categorias']->value) {
$_smarty_tpl->tpl_vars['categorias']->do_else = false;
?>
    <li class="nav-item"><a href="nombre_categoria/<?php echo $_smarty_tpl->tpl_vars['categorias']->value->nombre_categoria;?>
" class="nav-link"><?php echo $_smarty_tpl->tpl_vars['categorias']->value->nombre_categoria;?>
</a></li>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
