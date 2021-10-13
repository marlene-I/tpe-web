{include file="header.tpl"}
<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Categoria</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$categorias item=categoria}
                    <tr>
                         <td>{$categoria->nombre}</td>
                         <td><a href="modificarCategorias/{$categoria->id}" class = "btn btn-outline-danger">Modificar</a></td>
                         <td><a href="borrarCategoria/{$categoria->id}" class = "btn btn-outline-danger">Borrar</a></td>
                    </tr>
            {/foreach}
        </tbody>    
    </table>
</div>
{include file="footer.tpl"}
