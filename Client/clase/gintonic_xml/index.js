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

            //Creamos el objeto de tipo documento XML
            var documentoXml = peticion_http.responseXML;

            //Obtenemos la raíz del documento
            var root = documentoXml.getElementsByTagName("gintonic")[0];

            var retorno = "";

            var ginebra = root.getElementsByTagName("ginebra")[0].firstChild.nodeValue;
            retorno += "<h2>" + ginebra + "</h2>";

            var imagen = root.getElementsByTagName("img")[0].firstChild.nodeValue;
            retorno += "<div class='descripcion'>";
            retorno += "<div><img src='./images/" + imagen + "'></div>";

            var descripcion = root.getElementsByTagName("descripcion")[0].firstChild.nodeValue;
            retorno += "<div>" + descripcion + "</div>";
            retorno += "</div>";


            var ingredientes = root.getElementsByTagName("ingredientes")[0];
            var ingrediente = ingredientes.getElementsByTagName("ingrediente");

            retorno += "<h3>Listado ingredientes</h3>";
            retorno += "<ul>";

            for(var i = 0; i < ingrediente.length; i++){
                retorno += "<li type='disc'>"+ ingrediente[i].firstChild.nodeValue +"</li>";
            }
            retorno += "</ul>";


            retorno += "<h3>Proceso de elaboración</h3>";

            var elaboracion = root.getElementsByTagName("elaboracion")[0];
            var parrafo = elaboracion.getElementsByTagName("parrafo");

            for(var i = 0; i < parrafo.length; i++){
                retorno += "<p>"+ parrafo[i].firstChild.nodeValue +"</p>";
            }




            document.getElementById("content").innerHTML = retorno;

        }
    }
}

function muestraContenido2() {
    if(peticion_http.readyState == READY_STATE_COMPLETE) {
        if(peticion_http.status == 200) {
            document.getElementById("content").innerHTML = peticion_http.responseText;
        }
    }
}

function cambiar_pagina(){
    var url = "./" + this.getAttribute("data-url");

    //verificamos si cargamos un xml u otro tipo de archivo
    if(url.indexOf('xml') != -1){
        cargaContenido( url, "GET", muestraContenido);
    } else {
        cargaContenido( url, "GET", muestraContenido2);
    }

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