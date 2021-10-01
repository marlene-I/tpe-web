<?php
/* Smarty version 3.1.39, created on 2021-09-28 07:27:28
  from 'D:\xampp\htdocs\proyectos\WEB2\practico4\ejercicio6\templates\homebygenre.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6152a7c07d0702_82953467',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '157791798a434de25103cf0b8ea0886174652e64' => 
    array (
      0 => 'D:\\xampp\\htdocs\\proyectos\\WEB2\\practico4\\ejercicio6\\templates\\homebygenre.tpl',
      1 => 1632806551,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:tabla.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6152a7c07d0702_82953467 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="container">
<?php if ($_smarty_tpl->tpl_vars['genre']->value == 'Disney') {?>
    <h1>Lista Disney</h2>
    <a href='home'> Volver </a>
    <?php } else { ?>
    <h1>Lista por género: <?php echo $_smarty_tpl->tpl_vars['genre']->value;?>
</h2>
    <a href='home'> Volver </a>
    <p>la cantidad de peliculas es: <?php echo $_smarty_tpl->tpl_vars['count']->value->cant;?>
</p>
<?php }?>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:tabla.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
