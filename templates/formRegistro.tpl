{include file="header.tpl"}
 
<div class="mt-5 w-25 mx-auto">
 <h3>Añadir nuevo usuario</h3>

    <form action="Registro" method="post" >
        <div class="form-group">
            <div class="input-group-prepend"><label class="mt-2" >Usuario</label></div><input class="form-control mt-2" type="text" placeholder="Usuario" name="usuario">
           <div class="input-group-prepend"> <label class="mt-2">Contraseña</label></div><input class="form-control mt-2" type="password" placeholder="Contraseña" name="password">
            <div class="input-group-prepend"><label class="mt-2">Ingrese contraseña nuevamente</label></div><input class="form-control mt-2" type="password" placeholder="Repita la contraseña" name="password">
            <button class="form-control btn btn-dark mt-3" type="submit">Registrar</button>
        </div>
    </form>
</div>




{include file="footer.tpl"}