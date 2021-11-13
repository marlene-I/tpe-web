"use strict"

let appComments = new Vue ({
    el:'#comments',
    data: {
        comments: [],
        empty: null,
    },
    methods: {
        delComment(id_comment){
             //Se agrega metodo de Vue que llame a la funcion delComment desde el html (pasando por param el ID de coment)
            deleteComment(id_comment);
        }
    }
})

let span = document.querySelector("#id_producto"); //**CHA** 
let id_producto = span.innerHTML; //Captura el id de producto del que se quieren mostrar los comentarios
const API_URL = "api/comentarios/productos/" +id_producto;
const API_URL_2 = "api//productos/"+id_producto+"/comentarios/" ;

let div = document.querySelector("#comments"); //Div para user storie comentarios

let commentForm = document.querySelector("#post-comment-f"); 
commentForm.addEventListener('submit', insertComment);

async function getComments(){ //Fetchea comentarios para producto dado e imprime con Vue
    appComments.empty = null;
    try {
        let response = await fetch(API_URL);
        let resComments = await response.json();

        if (response.status == 200) {
            appComments.comments = resComments; //Renderiza los comentarios desde Vue
        } else {
            appComments.empty = "No hay comentarios aun"
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
        id_usuario: "1",
        comentario: inputComment.get('comentario'),
        puntuacion: inputComment.get('puntuacion'),
    }

    try {
        console.log("inside try");
        let response = await fetch(API_URL, {
            method: "POST",
            headers:{
                "Content-Type": "application/json",
            },
            body: JSON.stringify(newComment),
        })


        if(response.ok){
            let comment = await response.json();
            appComments.comments.push = comment;
            getComments();

        }
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
            //**CHECK** que es lo mas prolijo, borrar y traer la tabla devuelta
            // o borrar de la BD y si esta todo OK borrar del arreglo de comentarios????
        }
        
    } catch (error) {
        console.log(error);
    }

}

getComments();
