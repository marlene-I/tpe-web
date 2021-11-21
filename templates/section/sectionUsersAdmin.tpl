{include file="header.tpl"}
{if $users}
    <div class="d-flex justify-content-center">
        <h3 class="p-3">Administrar usuarios</h2>
    </div>
    {include file="table/tableUsers.tpl"}
{/if}
{include file="footer.tpl"}