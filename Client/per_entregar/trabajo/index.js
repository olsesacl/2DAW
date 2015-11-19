window.onload=function(){
    carrusel_random();
    setInterval(carrusel_random, 5000);
    var ocultar = document.getElementById("mostrar_ocultar").nextElementSibling;
    ocultar.onclick = mostrar_ocultar;
}

function mostrar_ocultar(){
    var mostrar_ocultar = this.previousElementSibling.getElementsByTagName('span');

    for(var i = 0 ; i < mostrar_ocultar.length; i++){

        if(mostrar_ocultar[i].style.display == 'block'){
            mostrar_ocultar[i].style.display = 'none';
            this.innerText = 'Leer más';
        } else {
            mostrar_ocultar[i].style.display = 'block';
            this.innerText = 'Leer menos';
        }

    }

}
function carrusel_random(){

    var fotos = ['ciclismo1.jpg','ciclismo2.jpg','ciclismo3.jpg','ciclismo4.jpg','ciclismo5.jpg','ciclismo6.jpg'];


    var carrusel = document.getElementById('carrusel_random').childNodes[3];

    var anterior = carrusel.getAttribute('data-now');

    do{
        var random = numeroAleatorio(0,5);
    }while(random == anterior);

    carrusel.setAttribute('data-now', random);
    carrusel.src='./images/'+ fotos[random];
}

function numeroAleatorio(min, max) {
    var num = parseInt(Math.random() * (max - min));
    return num + min;
}