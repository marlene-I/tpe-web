<div class="container col-auto">
    <form action="searchProducts" method="get" class="form-group">
        <div class="container m-3 col-sm-auto w-100">
            <h4 class="h4 m-2">Buscá lo que quieras!</h4>
            <div class="col-10">
                <small class="form-text text-muted m-2">Ingresá palabras claves (o algunas letras que recuerdes)</small>
            </div>
            <div class="col-12">
                <input type="text" name="prod-name" class=" form-control m-2 w-75" placeholder="Producto">
            </div>
            <div class="col-12">
                <input type="number" name="lowerLim-price" class="form-control m-2 w-75" placeholder="Precio mínimo">
            </div>
            <div class="col-12">
                <input type="number" name="upperLim-price" class="form-control m-2 w-75" placeholder="Precio máximo">
            </div>
            <div class="d-flex form-row">
                <div class="col-12">
                    <input type="text" name="categ-name" class="form-control m-2 w-75" placeholder="Categoría ">
                </div>
            </div>
            <div class="d-flex justify-content-start form-row">

                <div class="col-auto">
                    <button type="submit" class="btn btn-outline-dark px-4 m-2">Buscar</button>
                </div>
                <div class="col-auto">
                    <a type=button href="home" class="btn btn-outline-dark px-4 m-2">Volver</a>
                </div>
            </div>

        </div>

    </form>
</div>