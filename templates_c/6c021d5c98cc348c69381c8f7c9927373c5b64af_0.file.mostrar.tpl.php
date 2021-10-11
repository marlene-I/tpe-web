<?php
/* Smarty version 3.1.39, created on 2021-10-11 22:52:16
  from 'C:\xampp\htdocs\WEB II\tpe-web\templates\mostrar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6164a4009b4951_05924324',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6c021d5c98cc348c69381c8f7c9927373c5b64af' => 
    array (
      0 => 'C:\\xampp\\htdocs\\WEB II\\tpe-web\\templates\\mostrar.tpl',
      1 => 1633985521,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6164a4009b4951_05924324 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Categoria</th>
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
" class = "btn btn-outline-danger">Ver detalle</a></td>
                    </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>    
    </table>
</div><?php }
}
