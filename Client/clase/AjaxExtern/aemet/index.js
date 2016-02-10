var READY_STATE_UNINITIALIZED=0;
var READY_STATE_LOADING=1;
var READY_STATE_LOADED=2;
var READY_STATE_INTERACTIVE=3;
var READY_STATE_COMPLETE=4;

var peticion_http;

window.onload = function (){

    var poblacions = document.getElementById("poblacions");

    poblacions.addEventListener("change",cambiar_pagina, false);
    cambiar_pagina();

};

function cambiar_pagina(){

    url = "./proxyXML.php";
    var id = document.getElementById("poblacions").value;
    var parametros = "xml="+id;

    cargaContenido( url, "POST", muestraContenido, parametros);

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
            var div_tiempo = document.getElementById('tiempo');
            var html_tiempo = "";

            if (xmlDoc != null) {
                var dias = xmlDoc.getElementsByTagName("prediccion")[0].getElementsByTagName("dia");

                html_tiempo += "<h2>"+ xmlDoc.getElementsByTagName("nombre")[0].firstChild.nodeValue +"</h2>";
                html_tiempo += "<table border='1'>";

                html_tiempo += "<tr><td>Fecha</td><td>0-12</td><td>12-24</td><td>T Min</td><td>T Maxima</td><td>Humedad relativa min</td><td>Humedad relativa max</td><td>Viento</td></tr>";

                for (var i = 0; i < dias.length && i < 4; i++) {

                    html_tiempo += "<tr>";

                    var valor = dias[i].getElementsByTagName("estado_cielo");

                    html_tiempo += "<td>" + dias[i].getAttribute("fecha") + "</td>";

                    //estado del cielo 0-12
                    if(valor[0].firstChild != null){
                        var valor1 = valor[0].firstChild.nodeValue;

                        //html_tiempo += '<td style="background-color: #95B6E9"><img src="img/'+ valor1 +'_g.png" /></td>';
                        html_tiempo += '<td style="background-color: #95B6E9"><img src="http://www.aemet.es/imagenes/png/estado_cielo/'+ valor1 +'_g.png" /></td>';
                    } else {
                        html_tiempo += "<td></td>";
                    }

                    //estado del cielo 12-24
                    if(valor[1].firstChild != null){
                        var valor2 = valor[1].firstChild.nodeValue;
                        //html_tiempo += '<td style="background-color: #95B6E9"><img src="img/'+valor2+'_g.png" /></td>';
                        html_tiempo += '<td style="background-color: #95B6E9"><img src="http://www.aemet.es/imagenes/png/estado_cielo/'+valor2+'_g.png" /></td>';
                    } else {
                        html_tiempo += "<td></td>";
                    }

                    //temperatura minima
                    var temp_min = dias[i].getElementsByTagName("temperatura")[0].getElementsByTagName("minima")[0].firstChild;
                    if(temp_min != null){
                        html_tiempo += "<td>" + temp_min.nodeValue + 'º</td>';
                    } else {
                        html_tiempo += "<td></td>";
                    }

                    //temperatura maxima
                    var temp_max = dias[i].getElementsByTagName("temperatura")[0].getElementsByTagName("maxima")[0].firstChild;
                    if(temp_max != null){
                        html_tiempo += "<td>" + temp_max.nodeValue + 'º</td>';
                    } else {
                        html_tiempo += "<td></td>";
                    }

                    //humedad_relativa minima
                    var hum_min = dias[i].getElementsByTagName("humedad_relativa")[0].getElementsByTagName("minima")[0].firstChild;
                    if(hum_min != null){
                        html_tiempo += "<td>" + hum_min.nodeValue + '</td>';
                    } else {
                        html_tiempo += "<td></td>";
                    }

                    //humedad_relativa maxima
                    var hum_max = dias[i].getElementsByTagName("humedad_relativa")[0].getElementsByTagName("maxima")[0].firstChild;
                    if(hum_max != null){
                        html_tiempo += "<td>" + hum_max.nodeValue + '</td>';
                    } else {
                        html_tiempo += "<td></td>";
                    }

                    //viento
                    var direccion_viento = dias[i].getElementsByTagName("viento")[0].getElementsByTagName("direccion")[0].firstChild;
                    var viento = dias[i].getElementsByTagName("viento")[0].getElementsByTagName("velocidad")[0].firstChild;

                    if(direccion_viento != null && viento != null){
                        html_tiempo += "<td>" + direccion_viento.nodeValue + "<br>";
                        html_tiempo += "<div class='imagen_viento'><div class='imagen_direccion_viento imagen_"+ direccion_viento.nodeValue +"'></div>";
                        html_tiempo += "<div class='texto_km_viento'><div>"+ viento.nodeValue +"</div></div></div></td>";
                    } else {
                        html_tiempo += "<td></td>";
                    }


                    html_tiempo += "</tr>";
                }
                html_tiempo += "</table>";

                div_tiempo.innerHTML = html_tiempo;
            }
        }
    }
}
