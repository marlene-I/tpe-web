{include file="header.tpl"}
<form action="confirmar" method="POST">
    <input type="text" class="form-control mt-2"  name="producto" placeholder= "Producto">
    <input type="number" class="form-control mt-2" name="precio" placeholder="Precio">
    <input type="text" class="form-control mt-2" name="detalle" placeholder="Detalle del producto">
    {include file="selectCateg.tpl"}
    <input type="hidden" value="{$id}" class="form-control mt-2 " name="id">
    <button type="submit" class="btn btn-outline-success mt-2" >Confirmar</button>                 
    <a href="admin" class="btn btn-danger mt-2" >Cancelar</a>
</form>
{include file="footer.tpl"}