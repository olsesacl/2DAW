var READY_STATE_COMPLETE=4;
var peticion_http;

var platos = new Array;

// Funcion que añade elementos al final del array
Array.prototype.anadir = function(elemento) {
    this[this.length] = elemento;
};
function añadirPlatos(){
    var  plato = document.getElementById("platos").options.selectedIndex;

    var nombre_plato = document.getElementById("platos").options[plato].innerText;
    platos.anadir(nombre_plato);

    var mensaje = document.getElementById("mensaje");
    mensaje.innerHTML = "Se ha añadido el plato "+ nombre_plato +" a su comida";
}


window.onload = function (){

    document.getElementById("home").addEventListener("click",cargaContenidoPrincipal, false);
    document.getElementById("plato").addEventListener("click",cargaContenidoXML, false);
    document.getElementById("carta").addEventListener("click",cargaContenidoCarta, false);
    cargaContenidoPrincipal();
};

function cargaContenido(url, metodo, funcion, parameters) {
    peticion_http = inicializa_xhr();

    if(peticion_http) {
        peticion_http.onreadystatechange = funcion;
        peticion_http.open(metodo, url , true);

        if(parameters==null){
            parameters += 'nocache='+ Math.random();
        } else {
            parameters += '&nocache=' +Math.random();
        }

        peticion_http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        peticion_http.send(parameters);
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

function cargaContenidoPrincipal(){
    var url = "./principal.html";
    cargaContenido( url, "POST", muestraContenido);
}
function muestraContenido() {
    if(peticion_http.readyState == READY_STATE_COMPLETE) {
        if(peticion_http.status == 200) {
            document.getElementById("contingutajax").innerHTML = peticion_http.responseText;
        }
    }
}

function cargaContenidoXML(){
    var url = "./cochinillosegoviano.xml";
    cargaContenido( url, "POST", muestraContenidoXML);
}
function muestraContenidoXML() {
    if(peticion_http.readyState == READY_STATE_COMPLETE) {
        if(peticion_http.status == 200) {

            //Creamos el objeto de tipo documento XML
            var documentoXml = peticion_http.responseXML;

            //Obtenemos la raíz del documento
            var root = documentoXml.getElementsByTagName("recetas")[0];

            var retorno = "";

            var receta = root.getElementsByTagName("receta")[0];

            retorno += "<h2>" + receta.getElementsByTagName("titulo")[0].firstChild.nodeValue + "</h2>";

            var imagen = receta.getElementsByTagName("foto")[0].firstChild.nodeValue;
            //para eliminar las comillas que se recogen que sobran
            //imagen = imagen.replace('"', '');

            retorno += "<img src=" + imagen + ">";

            var ingredientes = root.getElementsByTagName("ingredientes")[0];
            var ingrediente = ingredientes.getElementsByTagName("ingrediente");

            retorno += "<h3>Listado ingredientes</h3>";
            retorno += "<ul>";

            for(var i = 0; i < ingrediente.length; i++){
                retorno += "<li type='disc'>"+ ingrediente[i].firstChild.nodeValue +"</li>";
            }
            retorno += "</ul>";

            var elaborar = root.getElementsByTagName("elaborar")[0];
            var paso = elaborar.getElementsByTagName("paso");

            retorno += "<h3>Pasos de su elaboracion</h3>";
            retorno += "<ul>";

            for(var i = 0; i < paso.length; i++){
                retorno += "<li type='disc'>"+ paso[i].firstChild.nodeValue +"</li>";
            }
            retorno += "</ul>";


            //devolvemos los datos
            document.getElementById("contingutajax").innerHTML = retorno;

        }
    }
}


function cargaContenidoCarta(){
    var url = "./carta.html";
    cargaContenido( url, "POST", muestraCarta);
}

function muestraCarta() {
    if(peticion_http.readyState == READY_STATE_COMPLETE) {
        if(peticion_http.status == 200) {

            document.getElementById("contingutajax").innerHTML = peticion_http.responseText;
            cargaEspecialidades();

            //Cuando note un cambio carga el 2 select
            document.getElementById("especialidades").addEventListener("change",cambiarPlatos, false);
            document.getElementById("platos").addEventListener("change",añadirPlatos, false);
            document.getElementById("anyadir").addEventListener("click",mostrarLista, false);

        }
    }
}
function cargaEspecialidades(){
    var url = "./cargaEspecialidadesXML.php";

    cargaContenido( url, "POST", muestraEspecialidades);

}
function muestraEspecialidades(){
    if(peticion_http.readyState == READY_STATE_COMPLETE) {
        if(peticion_http.status == 200) {

            //Creamos el objeto de tipo documento XML
            var documentoXml = peticion_http.responseXML;
            //Obtenemos la raíz del documento
            var root = documentoXml.getElementsByTagName("especialidades")[0];

            var retorno = "";
            retorno += "<option value='0'>- Selecciona -</option>";

            var especialidad = root.getElementsByTagName("especialidad");

            for(var i = 0; i < especialidad.length; i++){

                var codigo = especialidad[i].getElementsByTagName("codigo");
                var nombre = especialidad[i].getElementsByTagName("nombre");
                retorno += "<option value='"+ codigo[0].firstChild.nodeValue +"'>"+ nombre[0].firstChild.nodeValue +"</option>";
            }

            document.getElementById("especialidades").innerHTML = retorno;

        }
    }
}
function cambiarPlatos(){

    var url = "./cargaplatosXML.php";

    var parameters = "especialidad=" + encodeURIComponent(document.getElementById("especialidades").value);

    cargaContenido( url, "POST", muestraPlatos,parameters);
}

function muestraPlatos(){
    if(peticion_http.readyState == READY_STATE_COMPLETE) {
        if(peticion_http.status == 200) {

            //Creamos el objeto de tipo documento XML
            var documentoXml = peticion_http.responseXML;

            var retorno ="";

            if(documentoXml == null){

                retorno = "<option>- Selecciona Plato -</option>";

            } else {
                //Obtenemos la raíz del documento
                var root = documentoXml.getElementsByTagName("platos")[0];

                retorno = "<option>- Selecciona Plato -</option>";

                var plato = root.getElementsByTagName("plato");

                for(var i = 0; i < plato.length; i++){

                    var codigo = plato[i].getElementsByTagName("codigo");
                    var nombre = plato[i].getElementsByTagName("nombre");
                    retorno += "<option value='"+ codigo[0].firstChild.nodeValue +"'>"+ nombre[0].firstChild.nodeValue +"</option>";
                }
            }

            document.getElementById("platos").innerHTML = retorno;
        }
    }
}
function mostrarLista(){

    var retorno = '<ul>';

    for(var i = 0 ; i < platos.length; i++){
        retorno += '<li>'+ platos[i] +'</li>';
    }
    retorno += '</ul>';

    var ventana = window.open();
    ventana.document.write('<head><title>Lista platos</title></head>');
    ventana.document.write('<body>');
    ventana.document.write('<div id="contenedor">');

    ventana.document.getElementById("contenedor").innerHTML = retorno;
}