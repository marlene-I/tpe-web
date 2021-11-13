{literal}
<div id="comments" >

    <div class="container p-4 mb-4 bg-light border border-info rounded list-group-item">
        <div v-if="empty"> <h3>{{empty}}</h3></div>
        <div class="list-group-item" v-else v-for="comment in comments">
            <h3 class="col">{{comment.nombre}}</h3>
            <div class="col">Puntuación: {{comment.puntuacion}}</div>
        
        <div>{{comment.comentario}}</div>
        <button type="button" class="btn btn-danger" name="delete" 
        v-on:click="delComment(comment.id)" v-bind:comment-id="comment.id">Borrar</button>
        </div>
    </div>
{/literal}
    <div>
        {include file = "Vue/formInsertComment.tpl"}

    </div>

</div>
