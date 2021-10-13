{include file="header.tpl"}
<form action="modificarCategorias" method="POST">
    <input type="text" class="form-control mt-2" name="categoria" placeholder="Modificar nombre de categoria">
    <input type="hidden" value="{$id}" class="form-control mt-2 " name="id">
    <button type="submit" class="btn btn-danger mt-2">Confirmar</button>
</form>
{include file="footer.tpl"}