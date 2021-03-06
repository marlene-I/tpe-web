{if ($smarty.server.REQUEST_URI == ($smarty.server.PHP_SELF|dirname|cat:"/admin"))}
<div class="container">
    {else}
    <div class="container col-sm-8 m-4">
        {/if}
        <table class="table table-hover table-responsive">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Categoria</th>
                    {if ($smarty.server.REQUEST_URI == ($smarty.server.PHP_SELF|dirname|cat:"/admin"))}
                    <th></th>
                    <th></th>

                    <th>Acciones</th>
                    <th></th>
                    {else}
                    <th>Acciones</th>
                    {/if}

                </tr>
            </thead>
            <tbody>
                <!-- Pregunta si está en la sección admin para mostrar la edición -->
                {if ($smarty.server.REQUEST_URI == ($smarty.server.PHP_SELF|dirname|cat:"/admin")
                && isset($smarty.session.USER_ROL)
                && $smarty.session.USER_ROL == "1")}
                <tr>
                    <form class="form-group" action="agregar-producto" method="POST" enctype="multipart/form-data">
                        <td>
                            <input type="text" class="form-control" required="required" placeholder="Nombre de producto"
                                name="producto">
                        </td>
                        <td>
                            <input type="number" class="form-control" required="required" placeholder="Precio"
                                name="precio">
                        </td>
                        <td>
                            {include file="form/selectCategory.tpl"}
                        </td>
                        <td>
                            <input type="text" class="form-control" required="required" placeholder="Detalle"
                                name="detalle">
                        </td>
                        <td class=" col-sm-2">
                            <input type="file" name="imagen" id="imageToUpload" class="form-control">
                        </td>
                        <td>
                            <button type="submit" class="btn btn-success">Agregar</button>
                        </td>
                    </form>
                </tr>
                {/if}
                {if isset($productos) }
                {foreach from=$productos item=producto}
                <tr>
                    <div class="d-flex flex-row justify-content-center">
                        <td>{$producto->nombre_producto}</td>
                        <td>${$producto->precio_producto}</td>
                        <td>{$producto->nombre_categoria}</td>
                        <td class=" m-auto p-3 justify-content-center">
                            <a href="detalle/{$producto->id_productos}" class="btn btn-outline-success ">Ver detalle</a>
                        </td>
                        {if ($smarty.server.REQUEST_URI == ($smarty.server.PHP_SELF|dirname|cat:"/admin")
                        && isset($smarty.session.USER_ROL)
                        && $smarty.session.USER_ROL == "1")}
                        <td class=" m-auto p-3 d-flex inline justify-content-center"><a href="borrar/{$producto->id_productos}"
                                class="btn btn-outline-danger">Eliminar</a></td>
                        <td><a href="modificar/{$producto->id_productos}" class="btn btn-outline-danger">Modificar</a>
                        </td>
                        {if isset($producto->imagen)}
                        <td><a href="borrarImagen/{$producto->id_productos}"
                                class="btn btn-sm btn-outline-danger">Eliminar Imagen</a>
                        </td>
                        {/if}
                    </div>
                    {/if}
                </tr>
                {/foreach}
            {/if}
            </tbody>
        </table>
    </div>