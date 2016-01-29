var startMsec;

var READY_STATE_UNINITIALIZED=0;
var READY_STATE_LOADING=1;
var READY_STATE_LOADED=2;
var READY_STATE_INTERACTIVE=3;
var READY_STATE_COMPLETE=4;


window.onload = function(){
    var envio = document.getElementById("enviar");
    envio.addEventListener("click",carga_datos, false);

    var submit = document.getElementsByTagName("form");
    submit[0].addEventListener("submit", function(evt){ evt.preventDefault(); return false; },false);

    //ponemos en recurso la url de la pagina actual
    var recurso = document.getElementById("recurso");
    recurso.value = document.URL;
};

function nosubmit(){
    return false;
}


function carga_datos(){

    //limpiamos datos anteriores
    limpiar_datos();

    var startTime = new Date();
    //cogemos la hora actual
    startMsec = startTime.getTime();

    var url = document.getElementById("recurso").value;
    cargaContenido( url, "GET", muestraContenido);
}

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

function muestraContenido(){


    var startTime = new Date();
    var elapsed = (startTime.getTime() - startMsec);

    //guardamos en toestados el tiempo que ha tardado en proceder a hacer la peticion en cuestion
    var estados = "[" + elapsed + " mseg.] ";

    //escribimos la peticion de que es
    switch (peticion_http.readyState){
        case READY_STATE_LOADING:
            estados += "Cargando";
            break;
        case READY_STATE_LOADED:
            estados += "Cargado";
            break;
        case READY_STATE_INTERACTIVE:
            estados += "Interactivo";

            insertar_codigo_estado();
            mostrar_codigo();
            mostrar_cabeceras();

            break;
        case READY_STATE_COMPLETE:
            estados += "Completado";
            break;
    }

    //insertamos el nuevo dato en estados
    document.getElementById("estados").innerHTML += estados+"<br>";
}

function insertar_codigo_estado(){
    //insertamos los datos en codigo de estados
    document.getElementById("codigo").innerHTML += peticion_http.status + "<br>";
    document.getElementById("codigo").innerHTML += peticion_http.statusText + "<br>";
}

/**
 * limpiamos los div antes de volver a cargarlos con nuevos datos
 */

function limpiar_datos(){
    document.getElementById("estados").innerHTML = "";
    document.getElementById("codigo").innerHTML = "";
    document.getElementById("contenidos").innerText = "";
    document.getElementById("cabeceras").innerHTML = "";
}

/**
 * Mostramos el codigo de la pagina en un div
 */
function mostrar_codigo(){
    if(peticion_http.status == 200){
        var documento = peticion_http.responseText;
        document.getElementById("contenidos").innerText = documento;
    }
}

/**
 * Cargamos los datos de las cabeceras en un div
 */
function mostrar_cabeceras(){

    var cabeceras = peticion_http.getAllResponseHeaders();
    cabeceras = cabeceras.split("\n");

    for(var i = 0 ; i < cabeceras.length; i++){

        document.getElementById("cabeceras").innerHTML += cabeceras[i] + "<br>";

    }
}


