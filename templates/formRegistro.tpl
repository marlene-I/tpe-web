{include file="header.tpl"}

<div class="mt-5 w-25 mx-auto">
    <form action="Registro" method="post" >
        <div class="form-group">
            <input class="form-control" type="text" placeholder="Usuario" name="usuario">
            <input class="form-control" type="password" placeholder="Contraseña" name="password">
            <button class="form-control btn btn-dark mt-3" type="submit">Registrar</button>
        </div>
    </form>
</div>


{include file="footer.tpl"}