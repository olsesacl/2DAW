window.onload = function() {
    var cambios = document.getElementById("content");
    var paragraf = cambios.getElementsByTagName("div");

    for(var i = 0 ; i < paragraf.length; i++){
        paragraf[i].setAttribute("onmouseover", "destacar(this)");
        paragraf[i].setAttribute("onmouseout", "normal(this)");

        var avis = paragraf[i].getElementsByClassName("avis");
        avis[0].setAttribute("onclick", "avis("+i +")");

    }
    //mostrar_foto(0);

}

function destacar(onmouse){
    onmouse.setAttribute("class", "destacar");

    var cambios = document.getElementById("content");
    var paragraf = cambios.getElementsByTagName("div");

    var num = 0;

    for(var i = 0 ; i < paragraf.length; i++){
        if(paragraf[i] == onmouse){
            num = i;
        }
    }

    mostrar_foto(num);

}
function normal(onmouse){
    onmouse.setAttribute("class","");
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

function avis(num){
    var avisos = ["Precaucio per tormenta", "nou avis", "blabla"]

    alert(avisos[num]);
}