$(document).ready(function() {
    $(".fancybox").fancybox({
        padding: 0,

        openEffect : 'elastic',
        openSpeed  : 150,

        closeEffect : 'elastic',
        closeSpeed  : 150,
        helpers : {
            title: {
                overlay : null
            },
            overlay : {
                css : {
                    'background' : 'rgba(238,238,238,0.3)'
                }
            }
        },

        afterLoad : function() {
            this.title = 'Imagen ' + (this.index + 1) + ' de ' + this.group.length + (this.title ? ' - ' +
                this.title : '');
        }
    });
    $(".fancybox-altimetria").fancybox({
        padding: 0,

        openEffect : 'elastic',
        openSpeed  : 150,

        closeEffect : 'elastic',
        closeSpeed  : 150,
        helpers : {
            overlay : {
                css : {
                    'background' : 'rgba(238,238,238,0.3)'
                }
            }
        }
    });
});

window.onload = function(){
    cambiar_ports();
    document.getElementById('selector_ports').onchange = cambiar_ports;
};

function cambiar_ports(){

    //hacemos una busqueda porque en el arranque no enviamos el objeto y asi prevenir errores
    var id =document.getElementById('selector_ports').value;

    var div_ports = document.getElementById("ports");
    //eliminem el contingut del div abans de replenar en les dades corresponents
    div_ports.innerHTML = '';

    var dades = '';

    if(id == 1){

        for(var i = 2; i <5; i++){
          dades += mostrar(i);
        }

    } else {
        dades = mostrar(id);
    }

    div_ports.innerHTML = dades;

   // $('[data-tooltip]').

    $('[data-tooltip]').each(function () {

        var clase = $(this).data('color');

        $(this).tooltip({
            tooltipClass: clase,
            position: {
                my: "right center",
                at: "left+10 center",

            },
            content: function () {
                return $(this).data('tooltip');
            }


        });
    });
}
function mostrar(id){
    var ports ='';

    if(id == 2){
        ports = [
            "Pirineus",
            ["Tourmalet", "23", "2115", "", "Obert de Juny a Setembre. La resta de l&#39;any està tancat al tràfic per presència de neu", "Con sus 2 115 metros de altitud, el puerto del Tourmalet es uno de los puertos míticos del Tour de Francia. Los aficionados a la bici, los senderistas y los automovilistas que lo recorran podrán disfrutar de unas hermosas vistas de las montañas pirenaicas. En el descenso hacia la estación de Barèges, se puede visitar el jardín botánico del Tourmalet (abierto entre mediados de mayo y mediados de septiembre), dedicado a más de 2500 especies pirenaicas. ¡Es una forma excelente de familiarizarse con la flora local!"],
            ["Envalira", "23", "2404", "red", "Extremar les precaucions amb les boires repentines, visibilitat molt defectuosa", "El puerto de Envalira es el puerto de montaña con carretera más alto de los Pirineos, con 2.409 metros de altura sobre el nivel del mar, situado en Andorra entre las localidades de Soldeu y Pas de la Casa y el único acceso desde Andorra hacia Francia."],
            ["Aubisque", "22", "1709", "red", "Precaució amb els osos salvatges", "Se trata de un paso habitual del Tour de Francia, catalogado como una subida de categoría especial. El primer paso se realizó en el Tour de Francia de 1910, y desde entonces se ha subido con una frecuencia mayor a una vez cada dos años."]
        ];
    }else if(id == 3){
        ports = [
            "Alps",
            ["Alpe d'Huez ", "14", "1845", "red", "Extremar les precaucions amb les boires repentines, visibilitat molt defectuosa", "Alpe d'Huez es una de los más famosos finales de etapa de la ronda francesa. Apareció en el trazado de la Grande Boucle por primera vez en 1952, con la victoria del italiano Fausto Coppi y, aunque no se volvió a subir hasta el Tour de 1976 desde entonces ha estado presente en el recorrido de la carrera casi todos los años. Desde la edición del 95 parece que la frecuencia por la que han optado los organizadores para incluirla en el recorrido, es la de un año sí, un año no, salvo 2003 y 2004, incluida en ambas ocasiones, cambiando su secuencia de años impares a los pares.<br>Esquema de desnivel de Alpe d'Huez.<br>Su trascendencia en el desarrollo de la carrera se fue incrementando con cada nueva edición, hasta el punto de que, durante algunos años, era famosa la máxima de que \"quien sale de amarillo del Alpe d'Huez, gana el Tour de Francia\".<br> Sin embargo, tras los Tours del 87 y del 89, cuando ni Pedro Delgado ni Laurent Fignon pudieron hacerse con la victoria final en la general después de haber salido líderes de Alpe d'Huez, se dijo que además de salir líder del Alpe d'Huez, había que ganar una contrarreloj."],
            ["Stelvio", "22", "2758", "", "Obert de Juny a Setembre. La resta de l&#39;any està tancat al tràfic per presència de neu", "Con mucho orgullo estamos delante de uno de los grandes colosos del ciclismo, el passo dello Stelvio. Con su altura a la estratosfera el paso representa desde 1953 la Cima Coppi del Giro de Italia, es decir, el distintivo de puerto de mayor altitud de cada edición. Grabado en la retina tenemos los amantes del cicloturismo las míticas tornanti, icono de la historia viva del ciclismo.<br>El Stelvio (Stilfserjoch en alemán) es con sus 2758 mts. el paso de montaña asfaltado de mayor altitud de los Alpes Orientales, y el segundo más alto de los Alpes sólo por detrás del Col de l’Iseran francés, de 2770 mts. El puerto une el valle de Valtellina con Bormio (SS38) y es fronterizo con Suiza por el passo dell'Umbrail."],
            ["Passo di Gavia", "16", "2618", "", "Obert de Juny a Setembre. La resta de l&#39;any està tancat al tràfic per presència de neu", "Citados en uno de los olimpos del ciclismo, hoy nos toca ascender una de las cimas más míticas del ciclismo mundial en general y del Giro de Italia en particular como es el passo di Gavia, con características de coloso tanto por dureza como por porcentajes.<br>Después de una primera ascensión el 1960 con el puerto sin asfaltar que lo situó en el mundo, no fue hasta el 5 de junio de 1988 cuando sumando a su intrínseca dureza, se unió una impresionante tormenta de nieve. En una etapa que seguramente nunca se debió disputar, el frío y la agonía se reflejaba en unos destrozados ciclistas. Después de aquella proeza ha vuelto a ser cima Coppi del Giro de Italia en numerosas ocasiones.<br>El passo di Gavia es un puerto de montaña situado en los Alpes réticos italianos y es el décimo paso de montaña más alto de Europa con una altura de 2621 mts. La vía SS300 une Bormio al noroeste con Ponte di Legno al sur. Esta vertiente fue pavimentada por completo en la década de los noventa."]
        ];
    }else {
        ports = [
            "Resta del món",
            ["Mont Ventoux", "22", "1912", "", "Possibilitat de vents extrems al cim", "La montaña de los vientos infernales, la montaña asesina, un paisaje lunar coronado por una torre de telecomunicaciones de 50 metros de altura, que impone. \"Su clima (más que una ubicación geográfica) lo convierte en un terreno maldito, en una prueba para héroes, una especie de infierno en las alturas\" (Roland Barthes). Allí se volvió loco el suizo Ferdi Kubler en su escalada de 1955 y Tom Simpson, campeón del mundo en 1966, reventó fulminado un trágico 13 de julio de 1967 a dos km de la cima, víctima del esfuerzo y de su cóctel mortal de anfetaminas. La falta de oxígeno y de vegetación por sus laderas 'lunares', sus rampas imponentes, la hacen de las más temibles para el pelotón, donde se acumulan algunas de las más sonoras pájaras del ciclismo."],
            ["Angliru", "12", "1555", "", "Aquest port té rampes per damunt del 23%, la probabilitat de posar pèu a terra és alta", "Para sus defensores, un verdadero espectáculo, la quintaesencia de las escaladas... Para sus detractores, un absurdo, lo más cercano al masoquismo, sobre todo en la temible 'Cueña les Cabres' con curvas de hasta el 23.5%. Desde luego, sus últimos siete kilómetros con una pendiente media superior al 13% (rampas de 17, 18 y 20%) le hacen concitar el odio. "],
            ["Lagos de Covadonga", "14", "1134", "red", "Extremar les precaucions amb les boires repentines, visibilitat molt defectuosa", "Desde que el 2 de mayo de 1983 Marino Lejarreta los ascendiese se ha creado una mística, a la que ayudó mucho Bernard Hinault al compararlos con Alpe d'Huez. Fama universal en 17 ascensiones de este auténtico santuario de La Vuelta a España que han conquistado los más ilustres ganadores. \"En 1985 Indurain perdía el maillot de líder en Los Lagos en favor de Perico Delgado, y, once años y cinco Tours de Francia después, la carrera de Indurain terminó antes de su escalada, en el hotel El Capitán, en Cangas de Onís, donde el Banesto iba a parar la noche\"."]
        ];
    }

    var dades = '<table><tr><td class="title" colspan="6">' + ports[0] + '</td></tr>';
    dades +='<tr><th>Nom</th><th>Distancia</th><th>Altura</th><th>Galeria</th><th>Altimetria</th><th>Más' +
        ' datos</th></tr>';
    for(var i = 1; i < ports.length; i++){
        dades +="<tr data-tooltip='" + ports[i][4] + "' data-color='" + ports[i][3] + "' title=''>";
        dades +="<td>" + ports[i][0] + "</td>";
        dades +="<td>" + ports[i][1] + "km</td>";
        dades +="<td>" + ports[i][2] + "m</td>";

        //fotos
        dades +="<td><a href='./images/ports/"+ id +"/"+ i +"/1.jpg' class='fancybox' data-fancybox-group='fotos_"+ id +"_"+ i +"' data-fancybox-title='Unas cuantas fotos para disfrutar'><img src='./images/galerias.png'></a>";

        //el resto de fotos, aqui se ocultaran ya que no queremos verlas hasta pulsar en la galeria
        var j = 2;
        var exist = true;
        dades +="<div>";
        do{
            var file = "./images/ports/"+ id +"/"+ i +"/"+ j +".jpg";

            if(!UrlExists(file)){
                exist = false;
            } else {
                dades +="<div href='"+ file+ "' class='fancybox' data-fancybox-group='fotos_"+ id +"_"+ i +"' data-fancybox-title='No tiene titulo personalizado porque se carga buscando si existen fotos'></div>";
            }

            j++;


        }while(exist == true);

        dades +="</div>";

        dades +="</td>";
        dades += "<td><a class='fancybox-altimetria'  href='./images/ports/"+ id +"/"+ i +"/altimetria.jpg'><img src='./images/altimetria.png'></a></td> ";
        dades +="<td><span class='mostrar_mas' onclick=\"mostrar_ocultar('text_"+ id +"_"+ i +"')\">Mostrar más</span></td>";
        dades +="</tr>";
        dades +="<tr id='text_"+ id +"_"+ i +"' style='display:none;opacity:0;'><td colspan='6' class='text_port'>"+ ports[i][5] +"</td></tr>";
    }
    dades +="</table>"
    return dades;
}
function mostrar_ocultar(id){
    var text = document.getElementById(id);

    //duration of transition (1000 miliseconds equals 1 second)
    var duration = 500;
    // how many times should it should be changed in delay duration
    var AmountOfActions=100;

    var counte=0;
    if(text.style.display == 'none'){
        //text.setAttribute('class', '');

        text.style.display = 'table-row';

        setInterval(function(){
                counte ++;  if ( counte<AmountOfActions)    { text.style.opacity = counte/AmountOfActions;}
            },
            duration / AmountOfActions);
    }else {

        counte=AmountOfActions;
        setInterval(function(){
                counte --;  if ( counte>0)    { text.style.opacity = counte/AmountOfActions;}
            },
            duration / AmountOfActions);

        setTimeout(function() {
            text.style.display = 'none';
            }, duration
        );
    }
}

function UrlExists(url)
{
    try {
    var http = new XMLHttpRequest();

    http.open('HEAD', url, false);
    http.send();
    } catch (e) {
        return false;
    }
    return http.status!=404;
}