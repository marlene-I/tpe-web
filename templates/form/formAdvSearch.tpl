<form action="searchProducts" method="get" class="form-group">
    <div class="container m-3 w-75">
        <h3 class="h3  m-2">Busqueda avanzada:</h3>
        <small class="form-text text-muted m-2">Ingresá palabras claves.</small>

        <input type="text" name="prod-name" class=" form-control m-2 w-75"
            placeholder="Ingrese algunas letras del nombre">
        <div class=" d-flex form-row align-items-center ">
            <div class="col-5">
                <input type="number" name="lowerLim-price" class="form-control m-2 w-75"
                    placeholder="Ingrese precio mínimo">
            </div>
            <div class="col-5">
                <input type="number" name="upperLim-price" class="form-control m-2 w-75"
                    placeholder="Ingrese precio máximo">
            </div>
        </div>
        <div class="d-flex form-row">
            <div class="col-5">
                <input type="text" name="categ-name" class="form-control m-2 w-75"
                placeholder="Ingrese algunas letras de la categoría ">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-outline-dark m-2">Buscar</button>
            </div>
        </div>

    </div>

</form>