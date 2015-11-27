window.onload = function(){

    //enlazamos el evento submit a la funcion validar
    document.getElementById('formulari').onsubmit = validar;
};

function validar(){

    //eliminamos div de error anteriores
    var err_anterior = document.getElementsByClassName('validate_ko');

    //he puesto 0 porque al eliminar ese elmento siempre esta en la posicion 0
    while(err_anterior.length > 0){
        err_anterior[i].setAttribute('class', 'hidden');
    }
    document.getElementById('error_checkbox').setAttribute('class', 'hidden');
    document.getElementById('error_sugerencias').setAttribute('class', 'hidden');

    var errors = 0;

    //validar
    errors += validar_text();
    errors +=validar_email();
    //errors += validar_radio();  no hay que validarlo ya que por defecto tiene una opcion
    errors += validar_checkbox();
    errors += validar_opinion();
    errors += validar_sugerencias();
    errors += validar_selects();


    return false;
}

function validar_text(){
    var errors = 0;

    //hago la busqueda de todos los elementos que tengan como clase text, que son los que queremos validar
    var textos = document.getElementById('formulari').getElementsByClassName('text');

    //recorremos el array de elementos y verificamos que no esten vacios o con solo espacios en blanco
    //los que requieran otra verificacion se hara en otra funcion aparte
    for(var i = 0; i < textos.length; i++){
        if(textos[i].value == null || textos[i].value.length == 0 || /^\s+$/.test(textos[i].value)){
            errors++;

            mostrar_error(textos[i]);
        }
    }
    return errors;
}

function mostrar_error(elemento){

    //elemento es el elemento donde sale el mensaje de error y le cambia la clase.
    elemento.nextElementSibling.setAttribute('class', 'validate_ko');
}

function validar_email(){

    //esta validacion la hacemos por patron
    /**
     * Explicacion expresion:
     * /^ expr regular $/ , principio y fin de la expresion
     *
     * \w+([\.\+\-]?\w+)*
     * Ha de empezar por una letra o numeros, puede contener los simbolos . + o - y mas letras, el numero de veces que se quiera
     *
     * \w+([\.-]?\w+)*  igual que antes pero solo con el simbolo -
     *
     * (\.\w{2,4})+
     * Esta parte de codgo valida el .es , .com ... , esto significa que ha de tener entre 2 a 4 letras esos caracteres,
     * y como puede ser .com.es  esta el +
     * @type {RegExp}
     */
    var patron = /^\w+([\.\+\-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

    var url = document.getElementById('email');

    if(!patron.test(url.value)){
        mostrar_error(url);
        return 1;
    }
    return 0;
}


function validar_checkbox(){

    var errors = 1;

    var checkbox = document.getElementById('checkboxe');

    for(var i = 0 ; i < checkbox.childElementCount; i++){

        if(checkbox.children[i].type == 'checkbox'){
            if(checkbox.children[i].checked){
                errors = 0;
            }
        }
    }

    if(errors == 1){
        document.getElementById('error_checkbox').setAttribute('class', 'validate_ko');
    }

    return errors;
}

function validar_opinion(){

    //recogemos el textarea
    var opinion = document.getElementsByName('opinion');

    //esto es porque al buscar por nombre retorna un array y realmente sabemos que solo hay un elemento
    opinion = opinion[0];

    //solo comprobamos si el usuario ha cambiado el texto ya que para evaluar si esta vacio lo hace otra funcion
    if(opinion.value == 'Escriba aquí su opinión...'){
        mostrar_error(opinion);
        return 1;
    } else {
        return 0;
    }
}

function validar_sugerencias(){

    //recogemos el textarea
    var sugerencias = document.getElementsByName('sugerencias');

    //esto es porque al buscar por nombre retorna un array y realmente sabemos que solo hay un elemento
    sugerencias = sugerencias[0];

    //solo comprobamos si el usuario ha cambiado el texto ya que para evaluar si esta vacio lo hace otra funcion
    if(sugerencias.value == 'Escriba aquí sus sugerencias...'){
        mostrar_error(sugerencias);
        return 1;
    } else {
        return 0;
    }
}

function validar_selects(){
    var errors = 0;

    var selects = document.getElementsByName('frecuencia');
    //como devuelve un array lo hacemos asi
    var select = selects[0];

    //comprobamos cual de sus indices esta seleccionado, si el valor es -1 es porque no hay ninguno seleccionado
    var opcion = select.selectedIndex;
    if(opcion == -1)  mostrar_error(select);

    return errors;
}