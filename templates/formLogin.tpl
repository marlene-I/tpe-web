{include file="header.tpl"}

<div class="mt-5 w-25 mx-auto">
    <form action="login" method="post" >
        <div class="form-group">
            <input class="form-control" type="text" placeholder="Usuario" name="usuario">
            <input class="form-control" type="password" placeholder="Contraseña" name="password">
            <button class="form-control btn btn-dark mt-3" type="submit">Ingresar</button>
        </div>
    </form>
</div>

{if $error}
<div class="alert alert-danger mt-3">
    {$error}
</div>
{/if}

{include file="footer.tpl"}