{include file="header.tpl"}
 
<div class="mt-5 w-25 mx-auto">
 <h3>Añadir nuevo usuario</h3>

    <form action="registro" method="post" >
        <div class="form-group">
            <div class="input-group-prepend"><label class="mt-2" >Usuario</label></div><input class="form-control mt-2" type="text" required="required" placeholder="Usuario" name="usuario">
           <div class="input-group-prepend"> <label class="mt-2">Contraseña</label></div><input class="form-control mt-2" type="password" required="required" placeholder="Contraseña" name="password-1">
            <div class="input-group-prepend"><label class="mt-2">Ingrese contraseña nuevamente</label></div><input class="form-control mt-2" type="password" required="required" placeholder="Repita la contraseña" name="password-2">
            <button class="form-control btn btn-dark mt-3" type="submit">Registrar</button>
        </div>
    </form>
</div>
{if $error}
<div class="alert alert-danger mt-3">
    {$error}
</div>
{/if}



{include file="footer.tpl"}