{literal}
<div id="comments" >
    <div class="container p-4 mb-4 bg-light border border-info rounded list-group-item">
        <div v-if="empty"> <h3>{{empty}}</h3></div>
        <div class="list-group-item" v-else v-for="comment in comments" :key="comment.id">
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
    {literal}
    <div v-show="status == true" class="alert alert-success m-1">
        {{message}}
    </div>
    <div v-show="status == false" class="alert alert-danger m-1">
        {{message}}
    </div>

    </div>
    {/literal}

    <div v-if >
        {include file = "form/formInsertComment.tpl"}

    </div>
    {literal}
    
    {/literal}
</div>
