{include file="header.tpl"}

<div class="d-flex justify-content-center">
    <div class="container m-2">
        <div class="alert alert-info">
            <div class="d-flex flex-row m-3 justify-content-between">
                <div class="flex-column justify-content-center">
                    <h1> {$infoProducto->nombre} ${$infoProducto->precio} </h1>
                    <h5>Categoria: {$infoProducto->nombre_categoria}</h5>
                    <h5>Detalle de producto</h5>
                    <h6>{$infoProducto->detalle}</h6>
                    {if isset($infoProducto->imagen)}
                    <img src="{$infoProducto->imagen}" class="img-fluid m-2 border border-info rounded" />
                    {/if}
                    <div class="flex-row">
                        <a href="home" type="button" class="btn btn-outline-primary  mt-4">HOME</a>
                    </div>
                </div>


                <div class=" d-flex  flex-column ">
                    {if isset($smarty.session.USER_ID)}
                    <div class="list-group w-75 id=" user-info-div" id-producto={$id_producto}
                        id-usuario={$smarty.session.USER_ID}>
                        <h2 class="p-2 h2 pt-3 border-bottom text-center">Nuestros clientes dicen:</h2>
                        {include file = "vue/commentsVue.tpl"}
                    </div>
                    {else}
                    <div class="list-group w-75 row" id="user-info-div" id-producto={$id_producto}>
                        <h2 class="p-2 h2 pt-3 border-bottom text-center">Nuestros clientes dicen:</h2>
                        {include file = "vue/commentsVue.tpl"}
                    </div>
                    {/if}
                </div>
            </div>
        </div>
    </div>
    <script src="js/comment.js"></script>
    {include file="footer.tpl"}