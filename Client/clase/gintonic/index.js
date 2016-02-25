var READY_STATE_UNINITIALIZED=0;
var READY_STATE_LOADING=1;
var READY_STATE_LOADED=2;
var READY_STATE_INTERACTIVE=3;
var READY_STATE_COMPLETE=4;

var peticion_http;

function cargaContenido(url, metodo, funcion) {
    peticion_http = inicializa_xhr();

    if(peticion_http) {
        peticion_http.onreadystatechange = funcion;
        peticion_http.open(metodo, url  + '?nocache=' + Math.random(), true);
        peticion_http.send(null);
    }
}

function inicializa_xhr() {
    if(window.XMLHttpRequest) {
        return new XMLHttpRequest();
    }
    else if(window.ActiveXObject) {
        return new ActiveXObject("Microsoft.XMLHTTP");
    }
}

function muestraContenido() {
    if(peticion_http.readyState == READY_STATE_COMPLETE) {
        if(peticion_http.status == 200) {
            //alert(peticion_http.responseText);
            //document.write(peticion_http.responseText);
            document.getElementById("content").innerHTML = peticion_http.responseText;
        }
    }
}

function cambiar_pagina(){
    var url = "./" + this.getAttribute("data-url");
    cargaContenido( url, "GET", muestraContenido);
}

window.onload = function(){
    var div = document.getElementById("navigation");
    var links = div.getElementsByTagName("a");

    for(var i = 0 ; i < links.length; i++){
        links[i].addEventListener("click",cambiar_pagina, false);
    }

    links[0].cambiar_pagina = cambiar_pagina;
    links[0].cambiar_pagina();

};