<?php
/* Smarty version 3.1.39, created on 2021-10-01 18:48:43
  from 'D:\xampp\htdocs\proyectos\WEB2\TPE\templates\mostrar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61573beb9b0e73_91245126',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '30549e570c39ebffdd8a5667f0dee50364ff1f36' => 
    array (
      0 => 'D:\\xampp\\htdocs\\proyectos\\WEB2\\TPE\\templates\\mostrar.tpl',
      1 => 1633106920,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61573beb9b0e73_91245126 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container">
    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th>producto</th>
                <th>precio</th>
                <th>categoria</th>
            </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['producto']->value, 'productos');
$_smarty_tpl->tpl_vars['productos']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['productos']->value) {
$_smarty_tpl->tpl_vars['productos']->do_else = false;
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['productos']->value->nombre_producto;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['productos']->value->precio_producto;?>
</td>
                         <td><?php echo $_smarty_tpl->tpl_vars['productos']->value->nombre_categoria;?>
</td>
                    </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>    
    </table>
</div><?php }
}
