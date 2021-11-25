"use strict"

let appComments = new Vue ({
    el:'#comments',
    data: {
        comments: [], //Arreglo para renderizar comentarios
        empty: null, //Validación y renderizado de lista de comentarios vacía
        status: null, //Validación del estado de la solicitud del usuario 
        message: "",//A partir de la validación de status se renderiza este mensaje según la respuesta obtenida
        order: "no", //Validación para ordenar los comentarios
        scoreFilter: "no", // Validación para filtrar los comentarios por puntaje
        sortBy: "puntuacion", //Obtiene campo según el que (el usuario desea) ordenar los comentarios
        notFound:"", //Renderiza si el filtrado de comentarios no obtuvo ningun resultado
    },
    methods: {
        delComment: deleteComment,
        sortComments: getCommentSorted,
        renderComments: getComments,
        filterComments: getCommentsFiltered,
        },
    },
)

let userInfo_div = document.querySelector("#user-info-div");
let id_producto = userInfo_div.getAttribute('id-producto'); //Captura el id de producto del que se quieren mostrar los comentarios
let id_usuario = userInfo_div.getAttribute('id-usuario');
const API_URL = "api/comentarios/productos/" +id_producto;
const API_URL_2 = "api/comentarios/" ;

let div = document.querySelector("#comments"); //Div para user storie comentarios

let commentForm = document.querySelector("#post-comment-f"); 
commentForm.addEventListener('submit', insertComment);

async function getComments(){ //Fetchea comentarios para un producto dado e imprime con Vue
    appComments.empty = null;
    
    try {
        let response = await fetch(API_URL);
        let resComments = await response.json();

        if (response.status == 200) {
            appComments.comments = resComments; //Renderiza los comentarios desde Vue
        } else {
            appComments.empty = "No hay comentarios aun. Comenta!   "
        }
    }catch(e) {
        console.log(e);
    }
}

async function insertComment(e){ //Agrega un comentario nuevo a través de la API 
    e.preventDefault();
    let inputComment = new FormData(commentForm);
    let newComment = {
        id_producto: id_producto,
        id_usuario: id_usuario,
        comentario: inputComment.get('comentario'),
        puntuacion: inputComment.get('puntuacion'),
    }
    
    try {
        let response = await fetch(API_URL, {
            method: "POST",
            headers:{
                "Content-Type": "application/json",
            },
            body: JSON.stringify(newComment),
        })

        if(response.ok){
            appComments.empty = null;
            let comment = await response.json();
            appComments.comments.push(comment);


        }else{
            console.log(response.status)

        }
        showStatus(response.status, "ins");

    } catch (error) {
        console.log(error);
    }

}

async function deleteComment(comment_id){ //Elimina un comentario dado por ID
    try {
        let response = await fetch(API_URL_2+comment_id, {
            method:"DELETE",
            headers:{
                "Content-Type": "application/json",
            },
        });

        if(response.ok){
            for (const [index, comment] of appComments.comments.entries()) {
                if (comment.id == comment_id) {
                    appComments.comments.splice(index,1);
                }
            }
        }else{
            console.log(response.status);
        }
        showStatus(response.status, "del"); //Renderiza si el comentario fue eliminado con éxito (o no)
        checkEmptyComments() //Chequea si hay mas comentarios caso contrario renderiza
        
    } catch (error) {
        console.log(error);
    }

}

function checkEmptyComments(){//Renderiza lista de comentarios vacia
    let commentNum = appComments.comments.length;
    if(commentNum == 0){
        appComments.empty = "No hay comentarios aun. Comenta!   "
    }
}

function showStatus(code, method = ""){ //Muestra un estado de la solicitud al usuario
    let verb = "";
    appComments.status = false;
    //Los switch concatenan el mensaje que se mostrará al usuario dependiendo de la situación
    switch (method) {
        case "del":
            verb = "eliminado";
            break;
        case "ins":
            verb = "agregado";
            break;
        default:
            verb = "??";
            break;
    }
    switch (code) {
        case 403:
            appComments.message = "Error: no tenes los permisos para realizar esta acción";

            break;
        case 200:
            appComments.message = "Su comentario fue "+verb+" con éxito";
            appComments.status = true;

            break;
        default:
            appComments.message = "Error";
            break;
    }

    setTimeout(() => { //El mensaje se muestra por 2 segundos
        appComments.message = "";
        appComments.status = null;
    }, 2000);
}

async function getCommentSorted(order){ //Fetchea comentarios y retorna ordenados por Punt. o Antiguedad
    appComments.notFound = "";
    let sortBy = document.querySelector("#sortBy-select").value;
    let URL_sorted = API_URL + '?sort='+sortBy+'&order='+order;
    if(appComments.scoreFilter == 'yes'){ //Si el filtro por puntaje está activado, la url pasa otro query param de filtro
        let filterBy = document.querySelector("#filterBy-select").value;

        URL_sorted = URL_sorted+ '?sort='+sortBy+'&order='+order+'&score='+filterBy;
        console.log(URL_sorted+"\n"+filterBy+"\n"+appComments.scoreFilter)
    }
    try {
        let response = await fetch(URL_sorted);
        let resComments = await response.json();

        if (response.status == 200) {
            appComments.comments = resComments; //Renderiza los comentarios desde Vue
        } else if(response.status == 404){
            appComments.notFound = "No hay comentarios que coincidan con la búsqueda"
        }else{
            console.log(response.status)
        }
    }catch(e) {
        console.log(e);
    }
}


async function getCommentsFiltered(){// Fetchea y renderiza los comentarios por puntuación
    appComments.notFound = "";
    let filterBy = document.querySelector("#filterBy-select").value;
    let URL_filtered = API_URL+'?score='+filterBy;
    
    try {
        let response = await fetch(URL_filtered);
        let resComments = await response.json();

        if (response.status == 200) {
            appComments.comments = resComments; //Renderiza los comentarios desde Vue
        } else if(response.status == 404){
            appComments.notFound = "No hay comentarios que coincidan con la búsqueda"
        }else{
            console.log(response.status)
        }
    }catch(e) {
        console.log(e);
    }
}
getComments();
