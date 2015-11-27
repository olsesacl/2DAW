var temporizador = false;
var selector_carrusel = 0;

window.onload=function() {
    carrusel_random();


    document.getElementById('Marco').onmouseover = function(){
        if(selector_carrusel != 1){
            selector_carrusel = 1;
            if (temporizador) {clearTimeout(temporizador); temporizador = false;}
            carrusel_random();
        }

    };
    document.getElementById('Alberto').onmouseover = function(){
        if(selector_carrusel != 2){
            selector_carrusel = 2;
            if (temporizador) {clearTimeout(temporizador); temporizador = false;}
            carrusel_random();
        }

    };
    document.getElementById('Miguel').onmouseover = function(){
        if(selector_carrusel != 3){
            selector_carrusel = 3;
            if (temporizador) {clearTimeout(temporizador); temporizador = false;}
            carrusel_random();
        }

    };

};

function carrusel_random(){

    //pongo la primera linea de fotos como las de index para cuando aun no se ha seleccionado ningun ciclista
    var fotos = [['ciclismo1.jpg','ciclismo2.jpg','ciclismo3.jpg','ciclismo4.jpg'],
                ['marco1.jpg','marco2.jpg','marco3.jpg','marco4.jpg'],
                ['alberto1.jpg','alberto2.jpg','alberto3.jpg','alberto4.jpg'],
                ['miguel1.jpg','miguel2.jpg','miguel3.jpg','miguel1.4pg']];

    var carrusel = document.getElementById('carrusel_random').childNodes[3];
    var anterior = carrusel.getAttribute('data-now');
    var nuevo = '';
    do{
        var random = numeroAleatorio(0,3);
        nuevo = selector_carrusel + "_" + random;
    }while(nuevo == anterior);

    carrusel.setAttribute('data-now', nuevo);
    carrusel.src='./images/'+ fotos[selector_carrusel][random];
    temporizador = setTimeout(carrusel_random, 5000);
}

function numeroAleatorio(min, max) {
    var num = parseInt(Math.random() * (max - min));
    return num + min;
}