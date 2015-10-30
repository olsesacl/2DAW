window.onload = function() {
    var cambios = document.getElementById("content");
    var titulo = cambios.getElementsByTagName("h2");

    for(var i = 0 ; i < titulo.length; i++){
        titulo[i].firstChild.onmouseover = destacar;
        titulo[i].firstChild.onmouseout = normal;
    }

    var avisos = cambios.getElementsByClassName("avis");
    for(var i = 0 ; i < avisos.length; i++){
        avisos[i].onclick = avis;
    }

}


function destacar(){
    this.setAttribute("class", "destacar");

    var num = this.parentNode.id
    num = num.replace("titulo_", "");

    var texto = document.getElementById("texto_"+num);
    texto.firstElementChild.setAttribute("class","");

    var risc = document.getElementById("risc_"+num);
    risc.setAttribute("class", texto.previousElementSibling.classList + " hidden");

    var text_risc = document.getElementById("text_risc_"+num);
    if(text_risc != null)text_risc.setAttribute("class", "risc");

    mostrar_foto(num-1);

}
function normal(){
    this.setAttribute("class","");
    var num = this.parentNode.id
    num = num.replace("titulo_", "");

    var texto = document.getElementById("texto_"+num);
    texto.firstElementChild.setAttribute("class","hidden");

    var risc = document.getElementById("risc_"+num);
    risc.setAttribute("class", "meta");

    var text_risc = document.getElementById("text_risc_"+num);
    if(text_risc != null) text_risc.setAttribute("class", "hidden");


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

    var cambios = document.getElementById("content");
    var avis = cambios.getElementsByClassName("avis");
    for(var i = 0 ; i < avis.length; i++){
        if(avis[i] == this){
            alert(avisos[i]);
        }
    }
}