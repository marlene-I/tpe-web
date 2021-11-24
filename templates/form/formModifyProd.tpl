{include file="header.tpl"}
<form action="confirmar" class="form-group" method="POST" enctype="multipart/form-data">
    <div class="d-flex justify-content-center">

        <div class="border border-radius w-50 p-2 px-5 ">
            <h4 class="h4 my-4 text-center">Modificar producto</h4>
            <div class="p-2">
                <input type="text" class="form-control mt-2" name="producto" placeholder="Nombre de producto">
                <input type="number" class="form-control mt-2" name="precio" placeholder="Precio">
                <input type="text" class="form-control mt-2" name="detalle" placeholder="Detalle del producto">
                <div class="d-flex flex-row align-items-center">
                    <label for="imagen" class="label-form m-2"> Cargar Imagen</label>
                    <input type="file" name="imagen" id="imageToUpload" class="col form-control my-2">
                </div>

                {include file="form/selectCategory.tpl"}
                <div class="d-flex flex-row justify-content-center">

                    <input type="hidden" value="{$id}" class="form-control " name="id">
                    <button type="submit" class="btn btn-outline-success col-auto m-2">Confirmar</button>
                    <a href="admin" class="btn btn-danger  col-auto m-2">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</form>
{include file="footer.tpl" }