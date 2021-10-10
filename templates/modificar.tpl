{include file="header.tpl"}
<form action="modificar" method="POST">
    <input type="text" class="form-control mt-2"  name="producto" placeholder= "producto">
    <input type="number" class="form-control mt-2" name="precio" placeholder="precio">
    {include file="select.tpl"}
    <input type="hidden" value="{$id}" class="form-control mt-2 " name="id">
    <a href="listar" class="btn btn-danger mt-2" >cancelar</a>
    <button type="submit" class="btn btn-danger mt-2" >confirmar</button>                 
</form>
{include file="footer.tpl"}