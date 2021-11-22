{literal}
<div id="comments">

    <div class="container   p-4 mb-4 bg-light border border-info rounded list-group-item">
        <div v-if="empty">
            <h3>{{empty}}</h3>

        </div>
        <div v-else>
            <div>
                <div class="d-flex m-2">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input mx-1" name="order-check" v-model="order"
                            true-value="yes" false-value="no">
                        <label for="checkbox" class="form-check-label mx-1">Ordenar</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input mx-1" name="score-filter" id="score-filter-radio"
                            v-model="scoreFilter" true-value="yes" false-value="no">
                        <label for="score-filter" class="form-check-label mx-1">Filtrar por puntaje</label>
                    </div>
                </div>
                <div v-if="scoreFilter == 'yes'" class="container m-2">
                    <h5 class="h5">Filtrar por puntaje</h5>

                    <select name="filterBy" class="form-select" id="filterBy-select">
                        <option v-for="n in 5" v-bind:value="n">{{n}}</option>
                    </select>
                    <button v-if="order == 'no'" class="btn btn-secondary m-2" v-on:click.prevent="filterComments()">
                        Filtrar
                    </button>
                </div>
                <div v-if="order == 'yes'" class="container m-2">
                    <h5 class="h5">Ordenar por</h5>
                    <select name="sortBy" class='form-select' id="sortBy-select" v-model="sortBy">
                        <option value="puntuacion">Puntaje</option>
                        <option value="id">Antiguedad</option>
                    </select>
                    <button class="btn btn-secondary m-2" v-on:click.prevent="sortComments('ASC')">
                        Ascendente
                    </button>
                    <button class="btn btn-secondary  m-2" v-on:click.prevent="sortComments('DESC')">
                        Descendente
                    </button>
                    <button class="btn btn-secondary  m-2" v-on:click="getComments">
                        Quitar orden
                    </button>
                </div>
                <div v-if="order=='yes' && sortBy == 'puntuacion' && scoreFilter == 'yes'" class="alert alert-danger">
                    Si se filtra por puntaje el ordenamiento por puntaje no se aplicará!
                </div>


            </div>
            <div v-show="status == true" class="alert alert-success m-1">
                {{message}}
            </div>
            <div v-show="status == false" class="alert alert-danger m-1">
                {{message}}
            </div>


            <div v-if="notFound">
                <h3 class="h3 m-1">{{notFound}}</h3>
            </div>
            <div v-else>
                <div class="list-group-item " v-for="comment in comments" :key="comment.id">
                    <h3 class="col text-capitalize">{{comment.nombre}}</h3>
                    <div class="col">Puntuación: {{comment.puntuacion}}</div>
                    <div>{{comment.comentario}}</div>
                    {/literal}

                    {if (isset($smarty.session.USER_ROL) && $smarty.session.USER_ROL == "1")}
                    {literal}
                    <button type="button" class="btn btn-danger" name="delete" v-on:click="delComment(comment.id)"
                        v-bind:comment-id="comment.id">Borrar</button>
                    {/literal}
                    {/if}
                </div>
            </div>

        </div>




    </div>
    {literal}
    <div v-show="status == true" class="alert alert-success m-1">
        {{message}}
    </div>
    <div v-show="status == false" class="alert alert-danger m-1">
        {{message}}
    </div>


    {/literal}

    {include file = "form/formInsertComment.tpl"}

</div>