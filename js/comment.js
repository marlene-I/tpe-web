"use strict"

let appComments = new Vue ({
    el:'#comments',
    data: {
        comments: [],
    },
})

let div = document.querySelector("#comments"); //Div para user storie comentarios
let span = document.querySelector("#id_producto"); //**CHA** 

let id_producto = span.innerHTML; //Captura el id de producto del que se quieren mostrar los comentarios

const API_URL = "api/comentarios/productos/"+id_producto;


async function getComments(){ //Fetchea comentarios para producto dado e imprime con Vue
    try {
        let response = await fetch(API_URL);

        let resComments = await response.json();

        appComments.comments = resComments;       
    } catch (e) {
        console.log(e);
    }
}

let commentForm = document.querySelector("#post-comment-f"); 
commentForm.addEventListener('submit', insertComment);

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

getComments();