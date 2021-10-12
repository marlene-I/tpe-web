<div class="container">
    <form action="agregar">
        <h3>Agregar producto</h3>
        <input type="text" placeholder="producto" name="producto">
        <input type="number" placeholder="precio" name="precio">
        <input type="text" placeholder="detalle" name="detalle">
        {include file="select.tpl"}
        <button type="submit" class="btn btn-dark mt-2">Agregar</button>
    </form>
    
    <form action="agregar">
        <h3>Agregar categoria</h3>
        <input type="text" placeholder="Nombre de categoria" name="nombre_categoria">
        <button type="submit" class="btn btn-dark mt-2">Agregar</button>
    </form>
    <form action="borrar">
        {include file="select.tpl"}
        <button type="submit" class="btn btn-dark mt-2">Borrar</button>
    </form>
</div>
