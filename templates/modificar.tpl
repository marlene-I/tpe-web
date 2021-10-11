{include file="header.tpl"}
<form action="confirmar" method="POST">
    <input type="text" class="form-control mt-2"  name="producto" placeholder= "Producto">
    <input type="number" class="form-control mt-2" name="precio" placeholder="Precio">
    <input type="text" class="form-control mt-2" name="detalle" placeholder="Detalle del producto">
    {include file="select.tpl"}
    <input type="hidden" value="{$id}" class="form-control mt-2 " name="id">
    <a href="listar" class="btn btn-danger mt-2" >cancelar</a>
    <button type="submit" class="btn btn-danger mt-2" >confirmar</button>                 
</form>
{include file="footer.tpl"}