window.onload = function(){

    document.getElementById('formulario').onsubmit = false;
    document.getElementById('saveForm').onclick = validar;

    /*var numero = document.getElementsByClassName('number');
    for(var i = 0; i < numero.length; i++){
        numero[i].onblur = test_numero;
    }*/
}

/*function validar(){
    alert("entra");

    this.submit.disabled = false;
    return true;
}*/

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

    //validar text
    errors +=validar_text();
    errors +=validar_radio();
    errors +=validar_time();

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
       if(textos[i].value.length == 0){
           errors++;

          mostrar_error(textos[i], "El campo no puede estar vacio");
       }
    }
    return errors;
}
function validar_radio(){
    opciones = document.getElementsByName("element_13");

    var seleccionado = 0;
    for(var i=0; i<opciones.length; i++) {
        if(opciones[i].checked) {
            seleccionado = 1;
            break;
        }
    }
    if(seleccionado == 0){
        element_error = document.getElementById('li_13');
        mostrar_error(element_error.lastChild, "Se ha de seleccionar una opcion");
    }

    return seleccionado;
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
    if(!(minutos <= 59 && minutos >= 0)){
        error = 1;
        message += 'Los minutos han de ser un numero entre 0 y 59<br>'
    }
    if(!(segundos <= 59 && segundos >= 0)){
        error = 1;
        message += 'Los segundos han de ser un numero entre 0 y 59<br>'
    }

    if(error){
        element_error = document.getElementById('li_4');
        mostrar_error(element_error.lastChild, message);
    }

    return error;



}


function mostrar_error(elemento ,text){

    var iDiv = document.createElement('div');
    iDiv.className = 'validate_ko';
    iDiv.innerHTML = text;
    elemento.parentNode.appendChild(iDiv);
}
