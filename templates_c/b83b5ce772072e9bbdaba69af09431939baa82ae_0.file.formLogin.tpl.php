<?php
/* Smarty version 3.1.39, created on 2021-10-12 13:47:54
  from 'C:\xampp\htdocs\WEB II\tpe-web\templates\formLogin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_616575eab931b2_19365234',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b83b5ce772072e9bbdaba69af09431939baa82ae' => 
    array (
      0 => 'C:\\xampp\\htdocs\\WEB II\\tpe-web\\templates\\formLogin.tpl',
      1 => 1634039273,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_616575eab931b2_19365234 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="mt-5 w-25 mx-auto">
    <form action="login" method="post" >
        <div class="form-group">
            <input class="form-control" type="text" placeholder="Usuario" name="usuario">
            <input class="form-control" type="password" placeholder="Contraseña" name="password">
            <button class="form-control btn btn-dark mt-3" type="submit">Ingresar</button>
        </div>
    </form>
</div>

<?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
<div class="alert alert-danger mt-3">
    <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

</div>
<?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
