window.onload = function () {
    //seleccionamos todos los parrafos en cuestion
    var parrafos = document.getElementById('contenido_abajo').getElementsByTagName('p');

    //a cada parrafo le añadimos los eventos
    for(var i=0; i < parrafos.length; i++){
        //para no seleccionar el parrafo de arriba
        if(parrafos[i].id != 'especies'){
            parrafos[i].onmouseover = destacar;
            parrafos[i].onmouseout = normal;
        }

    }
};

function destacar(){

    //quitamos la clase destacar de los demas parrafos si lo tuvieran
    var parrafos = document.getElementById('contenido_abajo').getElementsByTagName('p');
    for(var i=0; i < parrafos.length; i++){
        parrafos[i].setAttribute('class','');
    }

    //añadimos la clase al parrafo en cuestion
    this.setAttribute('class', 'destacar');

    //cogemos el data-id del elemento para saber cual es
    var id = this.getAttribute('data-id');

    //mandamos esa informacion a otra funcion que es la que cambiara la imagen
    cambiar_imagen(id);
}

function cambiar_imagen(id){

    //declaramos el array con el nombre de las imagenes correspondientes

    var imagenes=['nutria.jpg', 'buitre_leonado.jpg', 'gineta.jpg'];
    //procedemos a cambiar la imagen
    document.getElementById('animal').src = './imagenes/'+imagenes[id];

}


//ponemos el parrafo normal quitandole la clase
function normal(){
    this.setAttribute('class', '');
}