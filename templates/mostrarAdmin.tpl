<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>producto</th>
                <th>precio</th>
                <th>categoria</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$productos item=producto}
                    <tr>
                        <td>{$producto->nombre_producto}</td>
                        <td>${$producto->precio_producto}</td>
                        <td>{$producto->nombre_categoria}</td>
                        <td><a href="detalleProducto/{$producto->id_productos}" class="btn btn-outline-danger">Ver detalle</a></td>
                        <td><a href="borrar/{$producto->id_productos}" class="btn btn-outline-danger">Eliminar</a></td>
                        <td><a href="modificar/{$producto->id_productos}" class="btn btn-outline-danger">Modificar</a></td>
                    </tr>
            {/foreach}
        </tbody>    
    </table>
</div>