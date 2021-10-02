<div class="container">
    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th>producto</th>
                <th>precio</th>
                <th>categoria</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$producto item=productos}
                    <tr>
                        <td>{$productos->nombre_producto}</td>
                        <td>${$productos->precio_producto}</td>
                         <td>{$productos->nombre_categoria}</td>
                    </tr>
            {/foreach}
        </tbody>    
    </table>
</div>