{include file="header.tpl"}

<div class="container m-5">
    <div class="alert alert-info">
        <h1> {$nombre}  ${$precio} </h1>
        <h5>Categoria: {$categoria}</h5>
        <h5>Detalle de producto</h5><h6>{$detalle}</h6>

    </div>
    <a href="home" type="button" class="btn btn-outline-success mt-2">HOME</a>
    <div class="list-group " v-bind: > <!-- Agregar estilo a este div corregir **CHA** -->
        <span id="id_producto" hidden>{$id_producto}</span>   <!--  //PREGUNTAR **CHA** Cambiar a pasar id por atributo-->
        <h2 class="p-2" >Comentarios</h2>
        {include file = "Vue/commentsVue.tpl"}
    </div>
    
</div>
<script src="js/comment.js"></script>
{include file="footer.tpl"}