window.onload = function() {
    var cambios = document.getElementById("content");
    var titulo = cambios.getElementsByTagName("h2");

    for(var i = 0 ; i < titulo.length; i++){
        titulo[i].firstChild.onmouseover = destacar;
        titulo[i].firstChild.onmouseout = normal;
    }

}


function destacar(){
    this.setAttribute("class", "destacar");


    var cambios = document.getElementById("content");
    var titulo = cambios.getElementsByTagName("h2");

    var num = 0;

    for(var i = 0 ; i < titulo.length; i++){
        if(titulo[i].firstChild == this){
            num = i;
        }
    }

    mostrar_foto(num);

}
function normal(){
    this.setAttribute("class","");
}

function mostrar_foto(id){

    var fotos = ["foto_0.jpg", "foto_1.jpg", "foto_2.jpg"];

    var imagen = document.createElement("img");
    imagen.src = "./image/" + fotos[id];

    var bottom = document.getElementById("bottom");
    var antigua = bottom.getElementsByTagName("img");

    if(antigua.length>0){
        bottom.removeChild(antigua[0]);
    }

    bottom.appendChild(imagen);

}

function avis(){
    var avisos = ["Precaucio per tormenta", "nou avis", "blabla"]

    alert(avisos[1]);
}