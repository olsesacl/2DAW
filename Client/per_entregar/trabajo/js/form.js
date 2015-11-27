$(function() {
    $( "#fecha" ).datepicker();
});

window.onload=function() {
    document.getElementById('form').onsubmit = validar;
    document.getElementById('submit').onclick = validar;
};

function validar(){
    this.disabled=true;

    //eliminamos div de error anteriores
    var err_anterior = document.getElementsByClassName('validate_ko');

    //tiene 0 porque al eliminar ese elmento siempre esta en la posicion 0
    while(err_anterior.length > 0){
        err_anterior[0].parentNode.removeChild(err_anterior[0]);
    }

    var errors = 0;

    //validar
    errors += validar_text();
    errors += validar_nif();
    errors += validar_telf();
    /*errors += validar_num();
    errors += validar_date();
    errors += validar_phone();*/
    this.disabled=false;
    if(errors == 0){
        alert('El formulario se va a enviar');
        return true;
    }
    else return false;



}

function validar_text(){
    var errors = 0;

    var textos = document.getElementById('form').getElementsByClassName('text');

    for(var i = 0; i < textos.length; i++){
        if(textos[i].value == null || textos[i].value.length == 0 || /^\s+$/.test(textos[i].value)){
            errors++;

            mostrar_error(textos[i], "El campo no puede estar vacio");
        }
    }
    return errors;
}

function validar_nif() {

    var input = document.getElementById('dni');
    var dni = input.value;

    //comprobamos esto, pero el error ya habra salido, asi que si no fuese valido de antes no mostrariamos el error
    if(!(dni == null || dni.length == 0 || /^\s+$/.test(dni))){

        var numero = dni.substr(0,dni.length-1);
        var let = dni.substr(dni.length-1,1);
        numero = numero % 23;
        var letra='TRWAGMYFPDXBNJZSQVHLCKET';
        letra=letra.substring(numero,numero+1);
        if (letra!=let.toUpperCase()){
            mostrar_error(input, "El DNI no es valido");
            return 1;
        }
    }
    return 0;
}

function validar_telf(){

    var input = document.getElementById('telf');
    var telf = input.value;

    var expresion_regular = /^\d{9}$/;
    if( !(expresion_regular.test(telf)) ) {

    }
}

function mostrar_error(elemento ,text){

    var iDiv = document.createElement('div');
    iDiv.className = 'validate_ko';
    iDiv.innerHTML = text;
    elemento.parentNode.appendChild(iDiv);
}