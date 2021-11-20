{include file="header.tpl"}
{if $users}
    <div class="d-flex justify-content-center">
        <h3 class="p-3">Administrar usuarios</h2>
    </div>
    {include file="table/tableUsers.tpl"}
{else}
    <div class="alert alert-danger m-5 d-flex justify-content-center">{$error}</div>
{/if}
{include file="footer.tpl"}