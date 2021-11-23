<div class="container border border-info list-group-item">

    <form action="comentar" method="post" id="post-comment-f">
        {if isset($smarty.session.USER_ROL) }
            {if $smarty.session.USER_ROL == 2}
                <h4>Ingrese comentario</h4>

                <div class="form-group">
                    <div class="input-group-prepend">
                        <label for="Comentario" class="mt-2">Comentario</label>
                        <input type="text" class="form-control" required="required" placeholder="Ingrese su comentario"
                            name="comentario">
                    </div>
                    <div class="input-group-prepend">
                        <label for="puntuacion" class="mt-2">Puntuacion</label>
                        <select name="puntuacion" id="puntuacion">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="input-group-prepend">
                        <button class="btn btn-info" type="submit">
                            Comentar
                        </button>
                    </div>

                </div>
            {elseif $smarty.session.USER_ROL == 1 }
            </form>
            <div class="container">
                <h3>Ingresá como usuario para comentar!</h3>
                <a href="logout" type="button" class="btn btn-primary m-1">Cerrar sesión</a>
            </div>
        {/if}
    {else}
        <div class="container">
            <h3>Ingresá como usuario para comentar!</h3>
            <a href="registro" type="button" class="btn btn-primary m-1"> Registrarse</a>
            <a href="login" type="button" class="btn btn-primary m-1"> Ingresar</a>
        </div>

    {/if}

</div>