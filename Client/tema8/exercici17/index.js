var READY_STATE_COMPLETE=4;
var peticion_http;



window.onload = function (){
    var url = "cargaProvinciasJSON.php";
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

            //Creamos el objeto json
            var respuesta_json = peticion_http.responseText;
            //Obtenemos la raíz del documento

            var objeto_json = eval("("+respuesta_json+")");

            var retorno = "";
            retorno += "<option value='0'>- Selecciona -</option>";


            for(var prop in objeto_json) {

                retorno += "<option value='"+ prop +"'>"+ objeto_json[prop] +"</option>";
            }

            document.getElementById("provincias").innerHTML = retorno;

        }
    }
}

function cargarMunicipios(){

    var parameter = "provincia=" + encodeURIComponent(this.value);

    var url = "cargaMunicipiosJSON.php";
    cargaContenido( url, "POST", muestraMunicipios,parameter);
}

function muestraMunicipios(){
    if(peticion_http.readyState == READY_STATE_COMPLETE) {
        if(peticion_http.status == 200) {

            //Creamos el objeto JSON
            var objeto_JSON = peticion_http.responseText;

            var retorno ="";

            if(objeto_JSON == null){

                retorno = "<option>- Selecciona Provincia -</option>";

            } else {
                //Creamos el objeto json
                var respuesta_json = peticion_http.responseText;
                //Obtenemos la raíz del documento

                var objeto_json = eval("("+respuesta_json+")");

                var retorno = "";
                retorno += "<option value='0'>- Selecciona -</option>";


                for(var prop in objeto_json) {

                    retorno += "<option value='"+ prop +"'>"+ objeto_json[prop] +"</option>";
                }
            }


            document.getElementById("municipios").innerHTML = retorno;

        }
    }
}