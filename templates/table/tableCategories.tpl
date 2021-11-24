
<div class="container">
    <table class="table table-hover w-75">
        <thead>
            <tr>
                <th>Categoria</th>
                <th>Acciones</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <form class="form-group" action="agregar-categoria">
                    <td>
                        <input type="text" class="form-control w-75" required="required" placeholder="Nombre de categoria" name="nombre_categoria">
                    </td>
                    <td>
                        <button type="submit" class="btn btn-success">Agregar</button>
                    </td>
                </form>
            </tr>

            {foreach from=$categorias item=categoria}
                    <tr>
                        
                         <td>{$categoria->nombre}</td>
                         <td><a href="borrarCategoria/{$categoria->id}" class = "btn btn-outline-danger">Eliminar</a></td>
                         <td><a href="modificarCategorias/{$categoria->id}" class = "btn btn-outline-danger">Modificar</a></td>
                    </tr>
            {/foreach}
        </tbody>    
    </table>
</div>

