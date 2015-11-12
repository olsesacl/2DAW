window.onload = function(){

    document.getElementById('formulario').onsubmit = false;
    document.getElementById('saveForm').onclick = validar;
};

function validar(){
    this.disabled=true;
    this.value='Verificando...';

    //eliminamos div de error anteriores
    var err_anterior = document.getElementsByClassName('validate_ko');

    //tiene 0 porque al eliminar ese elmento siempre esta en la posicion 0
    while(err_anterior.length > 0){
        err_anterior[0].parentNode.removeChild(err_anterior[0]);
    }


    var errors = 0;

    //validar
    errors += validar_text();
    errors += validar_radio();
    errors += validar_time();
    errors += validar_cp();
    errors += validar_selects();
    errors += validar_num();
    errors += validar_checkbox();
    errors += validar_date();
    errors += validar_phone();
    errors += validar_url();
    errors += validar_file();

   this.disabled=false;
    this.value='Submit';

  if(errors == 0){
      alert('El formulario se va a enviar');
      return true;
  }
  else return false;

}

function validar_text(){
    var errors = 0;

    var textos = document.getElementById('formulario').getElementsByClassName('text');

    for(var i = 0; i < textos.length; i++){
       if(textos[i].value == null || textos[i].value.length == 0 || /^\s+$/.test(textos[i].value)){
           errors++;

          mostrar_error(textos[i], "El campo no puede estar vacio");
       }
    }
    return errors;
}
function validar_radio(){
    var opciones = document.getElementsByName("element_13");

    var errors = 1;
    for(var i=0; i<opciones.length; i++) {
        if(opciones[i].checked) {
            errors = 0;
            break;
        }
    }
    if(errors == 1){
        var element_error = document.getElementById('li_13');
        mostrar_error(element_error.lastChild, "Se ha de seleccionar una opcion");
    }

    return errors;
}

function validar_time(){
    var horas = document.getElementById('element_4_1').value;
    var minutos = document.getElementById('element_4_2').value;
    var segundos = document.getElementById('element_4_3').value;

    var error = 0;

    var message = '';

    if(!(horas <= 12 && horas >= 1)){
        error = 1;
        message += 'La hora ha de ser un numero entre 1 y 12<br>'
    }
    if(!(minutos <= 59 && minutos >= 0 && minutos.length != 0)){
        error = 1;
        message += 'Los minutos han de ser un numero entre 0 y 59<br>'
    }
    if(!(segundos <= 59 && segundos >= 0 && segundos.length != 0)){
        error = 1;
        message += 'Los segundos han de ser un numero entre 0 y 59<br>'
    }

    if(error){
        var element_error = document.getElementById('li_4');
        mostrar_error(element_error.lastChild, message);
    }

    return error;
}

function validar_cp(){
    //Los codigos postales en España van desde 01000 hasta 5299
    var cp = /^(0[1-9]|[1-4][0-9]|5[0-2])[0-9]{3}$/;

    var test_cp = document.getElementById('element_5_5');
    var message = 'El codigo postal es incorrecto';

    if(!cp.test(test_cp.value)){
        mostrar_error(test_cp, message);
        return 1;
    } else{
        return 0;
    }
}

function validar_selects(){
    /*var lista = document.getElementById("opciones");
// Obtener el valor de la opción seleccionada
    var valorSeleccionado = lista.options[lista.selectedIndex].value;
// Obtener el texto que muestra la opción seleccionada
    var valorSeleccionado = lista.options[lista.selectedIndex].text;*/

    var errors = 0;
    var message = 'Has de seleccionar una opcion';

    var selects = document.getElementsByTagName('select');

    for(var i = 0 ; i < selects.length; i++){
        if(selects[i].options[selects[i].selectedIndex].value.length == 0 ){

            errors++;
            mostrar_error(selects[i], message);

        }
    }
    return errors;
}

//Comprobaremos tambien que el numero sea positivo
function validar_num(){

    var errors = 0;
    var message = 'Se ha de introducir un numero';
    var nums = document.getElementsByClassName('number');

    for(var i = 0 ; i < nums.length; i++){
        if(isNaN(nums[i].value) || nums[i].value % 1 != 0 || nums[i].value.length == 0 || nums[i].value < 0){

            errors++;
            mostrar_error(nums[i], message);
        }
    }
    return errors;
}

function validar_checkbox(){

    var errors = 1;
    var message = "Hay que seleccionar un elemento";

    var checkbox = document.getElementById('checkboxe');

    for(var i = 0 ; i < checkbox.childElementCount; i++){

        if(checkbox.children[i].type == 'checkbox'){
            if(checkbox.children[i].checked){
                errors = 0;
            }
        }
    }

    if(errors == 1){
        mostrar_error(checkbox.lastChild, message);
    }

    return errors;
}

function validar_date(){
    var errors = 0;

    var ano = document.getElementById("element_9_3").value;
    var mes = document.getElementById("element_9_1").value;
    var dia = document.getElementById("element_9_2").value;


    if(isNaN(ano) || ano % 1 != 0 || ano.length == 0 || ano <= 0) errors = 1;

    if(isNaN(mes) || mes % 1 != 0 || mes.length == 0 || mes <= 0 || mes > 12) errors = 1;

    if(isNaN(dia) || dia % 1 != 0 || dia.length == 0 || dia <= 0) errors = 1;
    else {

        var max_dia = 31;
        switch(mes){
            case '4': case '6': case '9': case '11':
                max_dia = 30;
                break;
            case '2':
                if (ano % 4 == 0) max_dia = 29;
                else max_dia = 28;
                break;
        }

        if(dia > max_dia){
            errors = 1;
        }
    }

    if(errors == 1){

        var message = "Se ha de introducir una fecha valida";

        mostrar_error(document.getElementById('li_9').lastChild, message);
        return 1;
    }
    return 0;
}

function validar_phone(){

    var patron = /^[0-9]{3}$/;
    var message = 'El numero de telefono es incorrecto';

    var phone = document.getElementsByClassName('phone');

    for(var i = 0 ; i < phone.length; i++){

        if(!patron.test(phone[i].value)){
            mostrar_error(document.getElementById('li_10').lastChild, message);
            return 1;
        }
    }
    return 0;
}

function validar_url(){
    //patron obtenido de http://cdn.jsdelivr.net/jquery.validation/1.14.0/jquery.validate.js

    var patron = /^(?:(?:(?:https?|ftp):)?\/\/)(?:\S+(?::\S*)?@)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})).?)(?::\d{2,5})?(?:[/?#]\S*)?$/i;
    var message = "Has de introducir una url valida";

    var url = document.getElementById('element_11');

    if(!patron.test(url.value)){
        mostrar_error(url, message);
        return 1;
    }
    return 0;
}

function validar_file(){
    var message = "Has de adjuntar un archivo";
    var file = document.getElementById('element_12');
    if(file.value == ''){
        mostrar_error(file, message);
        return 1;
    } else {
        return 0;
    }
}


function mostrar_error(elemento ,text){

    var iDiv = document.createElement('div');
    iDiv.className = 'validate_ko';
    iDiv.innerHTML = text;
    elemento.parentNode.appendChild(iDiv);
}
