<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Categoria</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$productos item=producto}
                    <tr>
                        <td>{$producto->nombre_producto}</td>
                        <td>${$producto->precio_producto}</td>
                         <td>{$producto->nombre_categoria}</td>
                         <td><a href="detalleProducto/{$producto->id_productos}" class = "btn btn-outline-danger">Ver detalle</a></td>
                    </tr>
            {/foreach}
        </tbody>    
    </table>
</div>