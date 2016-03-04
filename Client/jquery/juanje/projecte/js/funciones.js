var tiempo = null;

window.onload = function(){
    select();
    document.getElementById('select').onchange = select;
};

function select(){
    var sel = document.getElementById("select").selectedIndex;
    var divPirineos0 = document.getElementById("pirineos_div");
    var divAlpes1 = document.getElementById("alpes_div");
    var divResto2 = document.getElementById("resto_div");
    if (sel == 0){
        divPirineos0.style.display = "block";
        divAlpes1.style.display = "none";
        divResto2.style.display = "none";
    } else if(sel == 1){
        divPirineos0.style.display = "none";
        divAlpes1.style.display = "block";
        divResto2.style.display = "none";
    } else if(sel == 2){
        divPirineos0.style.display = "none";
        divAlpes1.style.display = "none";
        divResto2.style.display = "block";
    } else {
        divPirineos0.style.display = "block";
        divAlpes1.style.display = "block";
        divResto2.style.display = "block";
    }

}

function cambiaImagenes(obj){
    var img = document.getElementById("ciclistas_img");
    var aleat = Math.floor(Math.random()*4);
    img.src="images/ciclistes/"+obj.id+aleat+".jpg";
}

function carrusel(obj){
    //stopCarrusel();
    cambiaImagenes(obj);
    tiempo = setInterval(function(){cambiaImagenes(obj)}, 5000);

}

function stopCarrusel(){
    clearInterval(tiempo);
}

function cambiaCampe(ide){
    if(ide=='giro'){
        var img = document.getElementById('campeones');
        img.src="images/contador.jpg";
        var capti = document.getElementById('campeones_caption');
        capti.firstChild.nodeValue = 'Alberto Contador ganador del Giro de Italia 2015';
    }else if(ide=='tour'){
        var img = document.getElementById('campeones');
        img.src="images/froome.jpg";
        var capti = document.getElementById('campeones_caption');
        capti.firstChild.nodeValue = 'Chris Froome ganador del Tour de Francia 2015';
    }else if(ide=='vuelta'){
        var img = document.getElementById('campeones');
        img.src="images/aru.jpg";
        var capti = document.getElementById('campeones_caption');
        capti.firstChild.nodeValue = 'Fabio Aru ganador de la Vuelta 2015';
    }
}

function cambiarImg(){
    var img = document.getElementById('polaroids');
    var aleat = Math.floor(Math.random()*10);
    img.src="images/polaroids"+aleat+".jpg";
}

function cambiarImgBan(){
    var img = document.getElementById('bike-banner');
    var aleat = Math.floor(Math.random()*4);
    img.src="images/bike-banner"+aleat+".jpg";
}

function muestraOculta() {
    var adicional = document.getElementById("adicional");
    var leer_mas = document.getElementById("leer_mas");
    if (adicional.style.display == "" || adicional.style.display == "none") {
        adicional.style.display = "block";
        leer_mas.innerHTML="Leer menos";
    }
    else{
        adicional.style.display = "none";
        leer_mas.innerHTML="Leer m&aacute;s";
    }
}
/*
function cambiarImg(ide,num){
    var img = document.getElementById(ide);
    var aleat = Math.floor(Math.random()*(num));
    img.src="images/"+ide+aleat+".jpg";
}*/
function cuentaAtras() {
    var fecha1 = new Date('2016','03','30','12','00','00');
    var fecha2 = new Date('2016','06','02','12','00','00');
    var fecha3 = new Date('2016','08','03','12','00','00');

    for (var i = 1; i <= 3; i++) {
        var hoy=new Date();
        var dias=0;
        var horas=0;
        var minutos=0;
        var segundos=0;
        var arrayFechas = [fecha1,fecha2,fecha3];

        if (arrayFechas[i-1]>hoy){
            var diferencia=(arrayFechas[i-1].getTime()-hoy.getTime())/1000
            dias=Math.floor(diferencia/86400)
            diferencia=diferencia-(86400*dias)
            horas=Math.floor(diferencia/3600)
            diferencia=diferencia-(3600*horas)
            minutos=Math.floor(diferencia/60)
            diferencia=diferencia-(60*minutos)
            segundos=Math.floor(diferencia)

            document.getElementById("contador"+i).innerHTML='Quedan ' + dias + ' D&iacute;as, ' + horas + ' Horas, ' + minutos + ' Minutos, ' + segundos + ' Segundos'
        }
    }
}