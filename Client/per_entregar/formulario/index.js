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

           var iDiv = document.createElement('div');
           iDiv.name = 'validate';
           iDiv.className = 'validate_ko';
           iDiv.innerHTML = "El campo no puede estar vacio";
           textos[i].parentNode.appendChild(iDiv);
       }
    }
    return errors;
}
