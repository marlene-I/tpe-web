"use strict"

let appComments = new Vue ({
    el:'#comments',
    data: {
        comments: [],
        empty: null,
        status: null,
        message: "",
    },
    methods: {
        delComment(id_comment){

             //Se agrega metodo de Vue que llame a la funcion delComment desde el html (pasando por param el ID de coment)
            deleteComment(id_comment);
        },
    }
})

let div_data = document.querySelector("#data-div"); //**CHA** 
let id_producto = div_data.getAttribute('id-producto'); //Captura el id de producto del que se quieren mostrar los comentarios
let id_usuario = div_data.getAttribute('id-usuario');
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

            let comment = await response.json();
            appComments.comments.push(comment);

        }else{
            console.log(response.status)
        showStatus(response.status, "ins");

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
            appComments.comments.forEach(comment => { //loop en el arreglo Vue para borrar el comentario que matchee ID
                if (comment.id == comment_id) {
                    appComments.comments.pop(comment.id);
                }
                             
            });
        }else{
            console.log(response.status);
        }
        showStatus(response.status, "del");


    } catch (error) {
        console.log(error);
    }

}

function showStatus(code, method = ""){ //Muestra un estado de la solicitud al usuario
    let verb = "";
    appComments.status = false;
    switch (method) {
        case "del":
            verb = "borrado";
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

getComments();
