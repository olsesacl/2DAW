window.onload=function(){
    document.getElementById('mostrar_form').onclick = mostrar_ocultar;
};
function mostrar_ocultar(){
    var buscador = document.getElementById('buscador');

    if(buscador.style.display == 'none'){
        buscador.style.display = 'block';
        this.firstElementChild.setAttribute('src', 'img/16x16/remove_item.png');

    } else {
        buscador.style.display = 'none';
        this.firstElementChild.setAttribute('src', 'img/16x16/add_item.png');
    }
}
