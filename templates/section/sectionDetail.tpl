{include file="header.tpl"}

<div class="d-flex justify-content-center">
    <div class="container m-5">
        <div class="alert alert-info">
            <h1> {$nombre}  ${$precio} </h1>
            <h5>Categoria: {$categoria}</h5>
            <h5>Detalle de producto</h5><h6>{$detalle}</h6>

        </div>
        
    
        <a href="home" type="button" class="btn btn-outline-success mt-2">HOME</a>
        {if isset($smarty.session.USER_ID)}
        <div class="list-group w-50 row" id="user-info-div" id-producto={$id_producto} id-usuario={$smarty.session.USER_ID}>
            <h2 class="p-2 h2 pt-3 bg-light border-bottom text-justify" >Nuestros clientes dicen:</h2>
            {include file = "vue/commentsVue.tpl"}
        </div>
        {else}
        <div class="list-group w-50 row" id="user-info-div" id-producto={$id_producto} >
            <h2 class="p-2 h2 pt-3 bg-light border-bottom text-justify" >Nuestros clientes dicen:</h2>
            {include file = "vue/commentsVue.tpl"}
        </div>
        {/if}
        
    </div>
</div>
<script src="js/comment.js"></script>
{include file="footer.tpl"}