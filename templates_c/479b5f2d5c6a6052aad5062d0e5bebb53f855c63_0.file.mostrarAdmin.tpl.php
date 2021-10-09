<?php
/* Smarty version 3.1.39, created on 2021-10-09 22:03:31
  from 'D:\xampp\htdocs\proyectos\WEB2\tpe-web\templates\mostrarAdmin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6161f59375fa00_37532940',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '479b5f2d5c6a6052aad5062d0e5bebb53f855c63' => 
    array (
      0 => 'D:\\xampp\\htdocs\\proyectos\\WEB2\\tpe-web\\templates\\mostrarAdmin.tpl',
      1 => 1633809809,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6161f59375fa00_37532940 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>producto</th>
                <th>precio</th>
                <th>categoria</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productos']->value, 'producto');
$_smarty_tpl->tpl_vars['producto']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['producto']->value) {
$_smarty_tpl->tpl_vars['producto']->do_else = false;
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['producto']->value->nombre_producto;?>
</td>
                        <td>$<?php echo $_smarty_tpl->tpl_vars['producto']->value->precio_producto;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['producto']->value->nombre_categoria;?>
</td>
                        <td><a href="detalleProducto/<?php echo $_smarty_tpl->tpl_vars['producto']->value->id_productos;?>
">Ver detalle</a></td>
                        <td><a href="detalleProducto/<?php echo $_smarty_tpl->tpl_vars['producto']->value->id_productos;?>
">Eliminar</a></td>
                        <td><a href="detalleProducto/<?php echo $_smarty_tpl->tpl_vars['producto']->value->id_productos;?>
">Modificar</a></td>
                    </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>    
    </table>
</div><?php }
}
