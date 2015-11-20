window.onload = function(){
    cambiar_ports();
    document.getElementById('selector_ports').onchange = cambiar_ports;
};

function cambiar_ports(){

    //hacemos una busqueda porque en el arranque no enviamos el objeto y asi prevenir errores
    var id =document.getElementById('selector_ports').value;
   alert(id);

}