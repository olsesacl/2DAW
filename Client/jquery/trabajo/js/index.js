$( document ).ready(function() {
    carrusel_random();
    $('#mostrar_ocultar').siblings('div').click(mostrar_ocultar);

    var cuenta_atras = document.getElementById('cuenta_atras').getElementsByTagName('li');

    for(var i=0; i < cuenta_atras.length; i++){
        countdown(cuenta_atras[i]);

        //soles faig el event onmouseover perque queda millor que fent que desaparega la imatge cada vegada
        cuenta_atras[i].onmouseover = ganador;
    }
});

function mostrar_ocultar(){
    $('#mostrar_ocultar ~ p').slideToggle('slow');

    if($('#mostrar_ocultar ~ p:hidden')){
        $(this).text("Leer menos");
    } else {
        $(this).text("Leer más");
    }
}
function carrusel_random(){

    var fotos = ['ciclismo1.jpg','ciclismo2.jpg','ciclismo3.jpg','ciclismo4.jpg','ciclismo5.jpg','ciclismo6.jpg'];
    var carrusel = $('#carrusel_random img');
    var anterior = carrusel.attr('data-now');

    do{
        var random = numeroAleatorio(0,5);
    }while(random == anterior);

    carrusel.attr('data-now', random);
    carrusel.fadeTo(400, 0.30, function() {
        carrusel.attr('src', './images/' + fotos[random]);
    }).fadeTo(400,1);
    setTimeout(carrusel_random, 5000);
}

function numeroAleatorio(min, max) {
    var num = parseInt(Math.random() * (max - min));
    return num + min;
}

function countdown(id) {
    var fecha = new Date( id.getAttribute('data-year'), id.getAttribute('data-month'), id.getAttribute('data-day'), '00', '00', '00');
    var hoy = new Date();
    var dias = 0;
    var horas = 0;
    var minutos = 0;
    var segundos = 0;

    if (fecha > hoy) {
        var diferencia = (fecha.getTime() - hoy.getTime()) / 1000;
        dias = Math.floor(diferencia / 86400);
        diferencia = diferencia - (86400 * dias);
        horas = Math.floor(diferencia / 3600);
        diferencia = diferencia - (3600 * horas);
        minutos = Math.floor(diferencia / 60);
        diferencia = diferencia - (60 * minutos);
        segundos = Math.floor(diferencia);

        //comprobamos que tenga siempre 2 cigras
        minutos = checkzero(minutos);
        segundos = checkzero(segundos);

        if (dias > 0 || horas > 0 || minutos > 0 || segundos > 0) {
            setTimeout(function() {countdown(id)}, 1000);
        }
    }
    id.firstElementChild.innerHTML = 'Quedan ' + dias + ' Días, ' + horas + ' Horas, ' + minutos + ' Mins, ' + segundos + ' Seg';
}

function checkzero(min){
    if(min < 10){ min = "0" + min;}
    return min;
}

function ganador(){
    var img = ['ALBERTO-CONTADOR.jpg', 'Chris_Froome.jpg', 'Fabio_Aru.jpg'];
    var title = ['Alberto Contador ganador de laultima edicion', 'Chris Froome ganador de la ultima edicion', 'Fabio' +
    ' Aru ganador de la ultima edicion'];

    var ganador = document.getElementById('ganador');

    var volta = this.getAttribute('data-volta');

    ganador.style.background = "url('./images/"+img[volta]+"')";
    ganador.firstElementChild.innerHTML = title[volta];
}