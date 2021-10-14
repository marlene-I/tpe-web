{include file="header.tpl"}

<div class="container m-5">
    <div class="alert alert-info">
        <h1> {$nombre}  ${$precio} </h1>
        <h5>Categoria: {$categoria}</h5>
        <h5>Detalle de producto</h5><h6>{$detalle}</h6>

    </div>
    <a href="home" type="button" class="btn btn-outline-success mt-2">HOME</a>

</div>

{include file="footer.tpl"}