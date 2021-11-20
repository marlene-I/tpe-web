{literal}
<div id="comments" >
    <div v-if="htmlBolean">
        {{html}}
    </div>
    <div class="container p-4 mb-4 bg-light border border-info rounded list-group-item">
        <div v-if="empty"> <h3>{{empty}}</h3></div>
        <div class="list-group-item" v-else v-for="comment in comments">
            <h3 class="col text-capitalize">{{comment.nombre}}</h3>
            <div class="col">Puntuación: {{comment.puntuacion}}</div>
        
        <div>{{comment.comentario}}</div>
{/literal}

        {if (isset($smarty.session.USER_ROL) && $smarty.session.USER_ROL == "1")}
{literal}
        <button type="button" class="btn btn-danger" name="delete" 
        v-on:click="delComment(comment.id)" v-bind:comment-id="comment.id">Borrar</button>
        </div>
{/literal}

        {/if}
    </div>
    <div>
        {include file = "form/formInsertComment.tpl"}

    </div>

</div>
