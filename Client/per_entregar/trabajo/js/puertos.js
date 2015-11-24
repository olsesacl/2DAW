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
}
function mostrar(id){

    if(id == 2){
        var ports = [
            "Pirineus",
            ["Tourmalet", "23", "2115", "Con sus 2 115 metros de altitud, el puerto del Tourmalet es uno de los puertos míticos del Tour de Francia. Los aficionados a la bici, los senderistas y los automovilistas que lo recorran podrán disfrutar de unas hermosas vistas de las montañas pirenaicas. En el descenso hacia la estación de Barèges, se puede visitar el jardín botánico del Tourmalet (abierto entre mediados de mayo y mediados de septiembre), dedicado a más de 2500 especies pirenaicas. ¡Es una forma excelente de familiarizarse con la flora local!"],
            ["Envalira", "23", "2404"],
            ["Aubisque", "22", "1709"]
        ];
    }else if(id == 3){
        var ports = [
            "Alps",
            ["Alpe d'Huez ", "14", "1845"],
            ["Stelvio", "22", "2758"],
            ["Passo di Gavia", "16", "2618"]
        ];
    }else {
        var ports = [
            "Resta del món",
            ["Mont Ventoux", "22", "1912"],
            ["Angliru", "12", "1555"],
            ["Lagos de Covadonga", "14", "1134"]
        ];
    }

    var dades = '<table><tr><td class="title" colspan="4">' + ports[0] + '</td></tr>';
    dades +='<tr><th>Nom</th><th>Distancia</th><th>Altura</th><th>Más datos</th></tr>';
    for(var i = 1; i < ports.length; i++){
        dades +="<tr>";
        dades +="<td>" + ports[i][0] + "</td>";
        dades +="<td>" + ports[i][1] + "km</td>";
        dades +="<td>" + ports[i][2] + "m</td>";
        dades +="<td><span class='mostrar_mas' onclick=\"mostrar_ocultar('port_"+ id +"_"+ i +"')\">Mostrar más</span></td>";
        dades +="</tr>";
        dades +="<tr id='port_"+ id +"_"+ i +"' class='hidden'><td colspan='4' class='text_port'>"+ ports[i][3] +"</td></tr>";
    }
    dades +="</table>"

    return dades;
}
function mostrar_ocultar(id){
    alert(id);
}