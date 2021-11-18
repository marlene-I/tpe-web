<div class="container">
    <table class="table table-hover table-responsive">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Categoria</th>
                <th></th>
                <th>Acciones</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="table table-responsive">
            {foreach from=$productos item=producto}
                    <tr>
                        <td>{$producto->nombre_producto}</td>
                        <td>${$producto->precio_producto}</td>
                        <td>{$producto->nombre_categoria}</td>
                        <td><a href="detalle/{$producto->id_productos}" class="btn btn-outline-success">Ver detalle</a></td>
                        <td><a href="borrar/{$producto->id_productos}" class="btn btn-outline-danger">Eliminar</a></td>
                        <td><a href="modificar/{$producto->id_productos}" class="btn btn-outline-danger">Modificar</a></td>
                    </tr>
            {/foreach}
        </tbody>    
    </table>
</div>