"use strict"

let goBack_BTN = document.getElementById("go-back-btn");
goBack_BTN.addEventListener('click', goBack);

function goBack() {  //Da funcionalidad al botón de volver atrás
    window.history.back();
}
setInterval(() => {
    goBack();
}, 2000);