<form action="agregar">
    <input type="text" placeholder="producto" name="producto">
    <input type="number" placeholder="precio" name="precio">
    <input type="text" placeholder="detalle" name="detalle">
    {include file="select.tpl"}
    <button type="submit" class="mt-2">Agregar</button>
</form>