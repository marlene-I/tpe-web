{include file="header.tpl"}
    <div class="d-flex justify-content-around ">
        <div class="row w-75 h-100">
            <div class=" alert alert-danger m-2 "> {$error}</div>
            <div class="col">
                <a href="home" type="button" class=" btn btn-dark m-1 w-50">HOME</a>
            </div>    
            <div class="col">
                <button id="go-back-btn" class="btn btn-dark m-1 w-50">Volver atrás</button>
            </div>    
        </div>
    </div>
    <script src="js/goBack.js"></script>

{include file="footer.tpl"}