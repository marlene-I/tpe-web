{include file="header.tpl"}
 
<div class="mt-5 w-25 mx-auto">
 <h3 class="text-center">Registrate!</h3>

    <form action="registro" method="post" >
        <div class="form-group">
            <!-- <div class="input-group-prepend">
                <input class="form-control mt-3 mb-3 " type="text" required="required" placeholder="Nombre" name="nombre">
            </div> -->
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" required="required" placeholder="nombre" name="nombre">
                <label for="floatingInput">Nombre</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control"  id="floatingInputValue" placeholder="juan@example.com" value="juan@example.com" required="required" name="usuario">
                <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingInput" required="required" placeholder="Contraseña" name="password-1">
                <label for="floatingInput">Contraseña</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingInput" required="required" placeholder="Ingresá la contraseña nuevamente" name="password-2">
                <label for="floatingInput">Ingresá la contraseña nuevamente</label>
            </div>
            <div class="d-flex justify-content-center">
            <button class="btn btn-dark mt-3 w-50" type="submit">Registrame</button>
            </div>
        </div>
    </form>
</div>
{if $error}
<div class="alert alert-danger mt-3">
    {$error}
</div>
{/if}



{include file="footer.tpl"}