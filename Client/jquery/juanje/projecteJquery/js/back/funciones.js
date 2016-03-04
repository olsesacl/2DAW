$(document).ready(function() {
    //slider extraído de:
    //http://www.oloblogger.com/2013/04/mas-sencillo-slider-jquery.html
    $(function () {
        $('#contenedor_imagenes div:gt(0)').hide();
        setInterval(function () {
            $('#contenedor_imagenes div:first-child').fadeOut(0)
                .next('div').fadeIn(1000)
                .end().appendTo('#contenedor_imagenes');
        }, 3000);
    });
});
/*
window.onload = function(){
    select();
    document.getElementById('select').onchange = select;
};*/

/*
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
}*/





