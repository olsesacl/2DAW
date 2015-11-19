window.onload=function(){
    var buscador = document.getElementsByName('buscador');
    buscador.onclick = mostrar_ocultar;
    alert('test');
}
function mostrar_ocultar(){
    var buscador = document.getElementById('buscador');
    if(buscador.style.display=='none'){
        buscador.style.display=='block';
    } else {
        buscador.style.display=='none';
    }
}
