{literal}
<div id="comments" >
    <div class="container list-group-item"  v-for="comment in comments">
        <div>

        </div>
            <h3 class="col">{{comment.nombre}}</h3>
            <div class="col">Puntuación: {{comment.puntuacion}}</div>
        
        <div>{{comment.comentario}}</div>
    </div>
{/literal}
    <div>
        {include file = "Vue/formInsertComment.tpl"}

    </div>

</div>
