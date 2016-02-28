var temporizador;

function carga() {
    carrusel_random();
    $('#mostrar_ocultar').next().click(mostrar_ocultar);

    var cuenta_atras = $('#cuenta_atras li');

    cuenta_atras.each(function(){
        countdown($(this));

        //soles faig el event onmouseover perque queda millor que fent que desaparega la imatge cada vegada
        $(this).mouseover(ganador);
    })
};

function mostrar_ocultar(){
    $('#mostrar_ocultar').slideToggle('slow', function(){
        if($('#mostrar_ocultar:hidden').length==0){
            $('#mostrar_ocultar').next().text("Leer menos");
        } else {
            $('#mostrar_ocultar').next().text("Leer más");
        }
    });


}
function carrusel_random(){

    var fotos = ['ciclismo1.jpg','ciclismo2.jpg','ciclismo3.jpg','ciclismo4.jpg','ciclismo5.jpg','ciclismo6.jpg'];
    var carrusel = $('#carrusel_random img');
    var anterior = carrusel.attr('data-now');

    do{
        var random = numeroAleatorio(0,5);
    }while(random == anterior);

   /* carrusel.after('<img src="./images/'+ fotos[random]+'" data-now="'+ random+ '" style="display: none;">');

    carrusel.fadeOut(0).next('img').fadeIn(1000, function(){
        carrusel.remove();
    });*/

    carrusel.attr('data-now', random);
    carrusel.fadeTo(400, 0.20, function() {
        carrusel.attr('src', './images/' + fotos[random]);
    }).fadeTo(400,1);
    temporizador = setTimeout(carrusel_random, 5000);
}

function numeroAleatorio(min, max) {
    var num = parseInt(Math.random() * (max - min));
    return num + min;
}

function countdown(id) {
    var fecha = new Date( id.attr('data-year'), id.attr('data-month'), id.attr('data-day'), '00', '00', '00');
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
    id.first().html('Quedan ' + dias + ' Días, ' + horas + ' Horas, ' + minutos + ' Mins, ' + segundos + ' Seg');
}

function checkzero(min){
    if(min < 10){ min = "0" + min;}
    return min;
}

function ganador(){
    var img = ['ALBERTO-CONTADOR.jpg', 'Chris_Froome.jpg', 'Fabio_Aru.jpg'];
    var title = ['Alberto Contador ganador de laultima edicion', 'Chris Froome ganador de la ultima edicion', 'Fabio' +
    ' Aru ganador de la ultima edicion'];

    var volta = $(this).attr('data-volta');

    $('#ganador').fadeTo(200, 0.20, function() {
        $('#ganador').css("background", "url('./images/"+img[volta]+"')");
        $('#ganador h2:first-child').html(title[volta]);
    }).fadeTo(200,1);
}