<?php
/* Smarty version 3.1.39, created on 2021-10-10 23:55:13
  from 'C:\xampp\htdocs\WEB II\tpe-web\templates\select.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_616361413042e8_15802522',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '916d50910d4e360f059eb2f6f311f57d1c411566' => 
    array (
      0 => 'C:\\xampp\\htdocs\\WEB II\\tpe-web\\templates\\select.tpl',
      1 => 1633901345,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_616361413042e8_15802522 (Smarty_Internal_Template $_smarty_tpl) {
?><select name="categoria" id="select" class="form-select mt-2">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categorias']->value, 'categoria');
$_smarty_tpl->tpl_vars['categoria']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['categoria']->value) {
$_smarty_tpl->tpl_vars['categoria']->do_else = false;
?>
        <option value=<?php echo $_smarty_tpl->tpl_vars['categoria']->value->id;?>
><?php echo $_smarty_tpl->tpl_vars['categoria']->value->nombre;?>
</option>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>  
</select><?php }
}
