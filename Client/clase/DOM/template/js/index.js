
function changered(p1){
   // var p1 = document.getElementById(id);
    p1.style.color = "red";
    
}

function changewhite(p1){
   // var p1 = document.getElementById(id);
    p1.style.color = "white";
}

function changered2(){
    var p1 = document.getElementsByTagName('h2')[1];
    p1.style.color = "blue";
    
}

function changewhite2(){
    var p1 = document.getElementsByTagName('h2')[1];
    p1.style.color = "green";
}

function pagina_cargada(){

    var id = ["intro", "body"];


    for(var i = 0; i < id.length; i++){
       editar_por_id(id[i]);
    }
}
function editar_por_id(id){

    var cuerpo = document.getElementById(id);
    var links = cuerpo.getElementsByTagName('a');

    for(var i = 0; i < links.length; i++){
        links[i].setAttribute("onmouseover","custom()");
        links[i].setAttribute("onmouseout","normal()");
    }
}

function custom(){

    var links = document.getElementsByTagName("a");

    for(var i = 0; i < links.length; i++) {
        links[i].style.color = "orange";
        links[i].style.fontSize = "25px";
    }
}

function normal(){
    var links = document.getElementsByTagName("a");

    for(var i = 0; i < links.length; i++) {
        links[i].style.color = "";
        links[i].style.fontSize = "";
    }
}