<div class="container">
    <form action="agregar">
        <h3 class="p-3">Agregar producto</h3>
        <input type="text" placeholder="Nombre de producto" name="producto">
        <input type="number" placeholder="Precio" name="precio">
        <input type="text" placeholder="Detalle" name="detalle">
        {include file="selectCateg.tpl"}
        <button type="submit" class="btn btn-dark mt-2">Agregar</button>
    </form>
    
    <form action="agregar">
        <h3 class="p-3">Agregar categoria</h3>
        <input type="text" placeholder="Nombre de categoria" name="nombre_categoria">
        <button type="submit" class="btn btn-dark mt-2">Agregar</button>
    </form>
        <a href="modificarCategorias" class="btn btn-dark mt-2">Modificar Categorias</a>
</div>
