{include file="templates/header.tpl"}
<div class="d-sm-flex container m-3 ">
    {include file="templates/form/formAdvSearch.tpl"}
    {if $no_products === null}
        {include file="templates/table/tableProducts.tpl"}
    {else}
        <div class ="alert alert-secondary m-3 p-3">
            No hay productos que mostrar! 
        </div>
    {/if}

</div>
{include file="templates/footer.tpl"}