window.onload = function(){

    document.getElementById('formulario').onsubmit = validar;
    document.getElementById('saveForm').onclick = test;
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