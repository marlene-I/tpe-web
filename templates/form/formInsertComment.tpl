<div class="container border border-info list-group-item">
    <h4>Ingrese comentario</h4>
    <form action="comentar" method="post" id="post-comment-f"> 
        <div class="form-group">
            <div class="input-group-prepend">
                <label for="Comentario" class="mt-2">Comentario</label>
                <input type="text" class="form-control" required="required" placeholder="Ingrese su comentario" name="comentario">
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
    </form>
</div>