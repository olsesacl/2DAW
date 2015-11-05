window.onload = function(){

    document.getElementById('formulario').onsubmit = validar;
    document.getElementById('saveForm').onclick = test;
    var numero = document.getElementsByClassName('number');
    for(var i = 0; i < numero.length; i++){
        numero[i].onblur = test_numero;
    }
}

function validar(){
    alert("entra");

    this.submit.disabled = false;
    return true;
}

function test(){
    this.disabled=true;
    this.value='Enviando...';
    this.form.onsubmit();
}

function test_numero(){
    alert('esto es un numero');
}