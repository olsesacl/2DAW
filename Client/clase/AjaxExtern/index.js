var READY_STATE_UNINITIALIZED=0;
var READY_STATE_LOADING=1;
var READY_STATE_LOADED=2;
var READY_STATE_INTERACTIVE=3;
var READY_STATE_COMPLETE=4;

var peticion_http;

window.onload = function (){

    cambiar_pagina();

};

function cambiar_pagina(){

    url = "./proxyXML.php";
    $parametros = "xml=localidad_46181.xml";

    cargaContenido( url, "POST", muestraContenido, $parametros);

}

function inicializa_xhr() {
    if(window.XMLHttpRequest) {
        return new XMLHttpRequest();
    }
    else if(window.ActiveXObject) {
        return new ActiveXObject("Microsoft.XMLHTTP");
    }
}

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

function muestraContenido() {
    if (peticion_http.readyState == READY_STATE_COMPLETE) {
        if (peticion_http.status == 200) {

            //Creamos el objeto de tipo documento XML
            var xmlDoc = peticion_http.responseXML;
            var div_dias = document.getElementById('dias');
            var div_horas = document.getElementById('horas');
            var ImprimirHorasHtml;

            if (xmlDoc != null) {
                //var ImprimirHorasHtml = '<table cellpadding="0" cellspacing="0" style="width: 100%">';
                var horas_tag = xmlDoc.getElementsByTagName("temperatura")[0].getElementsByTagName("dato");
                for (var i = 0; i < horas_tag.length; i++) {
                    ImprimirHorasHtml = xmlDoc.getElementsByTagName("temperatura")[0].getElementsByTagName("dato")[i].firstChild.nodeValue;
// Obtenemos los datos horarios que nos interesen
                   /* var fecha = horas_tag[i].getElementsByTagName("fecha")[0].childNodes[0].nodeValue;
                    var hora_datos = horas_tag[i].getElementsByTagName("hora_datos")[0].childNodes[0].nodeValue;
                    var temperatura = horas_tag[i].getElementsByTagName("temperatura")[0].childNodes[0].nodeValue;
                    var texto = horas_tag[i].getElementsByTagName("texto")[0].childNodes[0].nodeValue;
                    var humedad = horas_tag[i].getElementsByTagName("humedad")[0].childNodes[0].nodeValue;
                    var presion = horas_tag[i].getElementsByTagName("presion")[0].childNodes[0].nodeValue;
                    var icono = horas_tag[i].getElementsByTagName("icono")[0].childNodes[0].nodeValue;
                    var viento = horas_tag[i].getElementsByTagName("viento")[0].childNodes[0].nodeValue;
                    var dir_viento = horas_tag[i].getElementsByTagName("dir_viento")[0].childNodes[0].nodeValue;
                    var ico_viento = horas_tag[i].getElementsByTagName("ico_viento")[0].childNodes[0].nodeValue;
                    var kmh = '';
                    if (isNumber(viento)) {
                        kmh = ' km/h';
                    }
                    ImprimirHorasHtml += '<tr><td>' + hora_datos + '</td><td>' + temperatura + ' &deg;C</td><td><img src="' + icono + '" title="' + texto + '" /></td><td>' + texto + '</td><td>' + humedad + '%</td><td>' + presion + ' hPa</td><td>' + viento + kmh + '</td><td>' + dir_viento + '</td></tr>';*/
                }
                //ImprimirHorasHtml += '</table>';
                div_horas.innerHTML = ImprimirHorasHtml;


            }
        }
    }
}
