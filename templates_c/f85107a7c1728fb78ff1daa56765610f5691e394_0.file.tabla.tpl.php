<?php
/* Smarty version 3.1.39, created on 2021-09-28 07:27:39
  from 'D:\xampp\htdocs\proyectos\WEB2\practico4\ejercicio6\templates\tabla.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6152a7cbe71526_29655453',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f85107a7c1728fb78ff1daa56765610f5691e394' => 
    array (
      0 => 'D:\\xampp\\htdocs\\proyectos\\WEB2\\practico4\\ejercicio6\\templates\\tabla.tpl',
      1 => 1632806857,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6152a7cbe71526_29655453 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container">
<table class="table table-success table-striped">
    <thead>
        <tr>
            <th>Título</th>
            <th>Año</th>
            <th>Estudio</th>
        </tr>
    </thead>
    <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['movies']->value, 'movie');
$_smarty_tpl->tpl_vars['movie']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['movie']->value) {
$_smarty_tpl->tpl_vars['movie']->do_else = false;
?>
        <?php if ($_smarty_tpl->tpl_vars['movie']->value->audience_score >= 70) {?>
            <tr>
                <td>⭐<?php echo $_smarty_tpl->tpl_vars['movie']->value->title;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['movie']->value->year;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['movie']->value->studio;?>
</td>
            </tr>
        
        <?php } else { ?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['movie']->value->title;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['movie']->value->year;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['movie']->value->studio;?>
</td>
            </tr>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tbody>    
</table>
</div><?php }
}
