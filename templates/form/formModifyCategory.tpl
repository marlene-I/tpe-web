{include file="header.tpl"}
<h3 class="m-5">Modificar nombre de categoría</h3>
<form action="modificarCategorias" class="form-group m-5 w-75" method="POST">
    <input type="text" class="form-control w-75 m-2" name="categoria" placeholder="Modificar nombre de categoria">
    <input type="hidden" value="{$id}" class="form-control m-2 " name="id">
    <button type="submit" class="btn btn-outline-success m-2">Confirmar</button>
    <a href="admin" class="btn btn-danger m-2" >Cancelar</a>
</form>
{include file="footer.tpl"}