var READY_STATE_COMPLETE=4;
var peticion_http;



window.onload = function (){
    var url = "cargaProvinciasXML.php";
    cargaContenido( url, "POST", muestraProvincias,null);

    //cargamos los nuevos eventos despues de haber cargado el contenido
    var provincias = document.getElementById("provincias");

    provincias.addEventListener("change",cargarMunicipios, false);
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

function muestraProvincias() {
    if(peticion_http.readyState == READY_STATE_COMPLETE) {
        if(peticion_http.status == 200) {

            //Creamos el objeto de tipo documento XML
            var documentoXml = peticion_http.responseXML;
            //Obtenemos la raíz del documento
            var root = documentoXml.getElementsByTagName("provincias")[0];

            var retorno = "";
            retorno += "<option value='0'>- Selecciona -</option>";

            var provincia = root.getElementsByTagName("provincia");

            for(var i = 0; i < provincia.length; i++){

                var codigo = provincia[i].getElementsByTagName("codigo");
                var nombre = provincia[i].getElementsByTagName("nombre");
                retorno += "<option value='"+ codigo[0].firstChild.nodeValue +"'>"+ nombre[0].firstChild.nodeValue +"</option>";
            }

            document.getElementById("provincias").innerHTML = retorno;

        }
    }
}

function cargarMunicipios(){

    var parameter = "provincia=" + encodeURIComponent(this.value);

    var url = "cargaMunicipiosXML.php";
    cargaContenido( url, "POST", muestraMunicipios,parameter);
}

function muestraMunicipios(){
    if(peticion_http.readyState == READY_STATE_COMPLETE) {
        if(peticion_http.status == 200) {

            //Creamos el objeto de tipo documento XML
            var documentoXml = peticion_http.responseXML;

            var retorno ="";

            if(documentoXml == null){

                retorno = "<option>- Selecciona Provincia -</option>";

            } else {
                //Obtenemos la raíz del documento
                var root = documentoXml.getElementsByTagName("municipios")[0];



                var municipio = root.getElementsByTagName("municipio");

                for(var i = 0; i < municipio.length; i++){

                    var codigo = municipio[i].getElementsByTagName("codigo");
                    var nombre = municipio[i].getElementsByTagName("nombre");
                    retorno += "<option value='"+ codigo[0].firstChild.nodeValue +"'>"+ nombre[0].firstChild.nodeValue +"</option>";
                }
            }


            document.getElementById("municipios").innerHTML = retorno;

        }
    }
}