$(function() {
    $(document).ready(function () {
        //poner el calendario en español
        $.datepicker.regional['es'] = {
            closeText: 'Cerrar',
            prevText: '<Ant',
            nextText: 'Sig>',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
            dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
            weekHeader: 'Sm',
            dateFormat: 'dd/mm/yy',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
        };
        $.datepicker.setDefaults($.datepicker.regional['es']);
    });
    $( "#fecha" ).datepicker();
});

window.onload=function() {
    $('#form').submit(validar);
    $('#submit').click(validar);
};

function validar(){
    this.disabled=true;

    $('.validate_ko').remove();

    var errors = 0;

    //validar
    errors += validar_text();
    errors += validar_nif();
    errors += validar_telf();
    errors += validar_date();
    errors += validarEmail();

    this.disabled=false;
    if(errors == 0){
        //alert('El formulario se va a enviar');
        return true;
    }
    else return false;



}

function validar_text(){
    var errors = 0;

    $('#form .text').each(function() {
        if($(this).val() == null || $(this).val().length == 0 || /^\s+$/.test($(this).val())){
            errors++;

            mostrar_error($(this), "El campo no puede estar vacio");
        }
    });
    return errors;
}

function validar_nif() {

    var input = $('#dni');
    var dni = input.val();

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

    var telf = $('#telf').val();

    var expresion_regular = /^\d{9}$/;
    if( !(expresion_regular.test(telf)) ) {
        mostrar_error($('#telf'), "El telefono no es valido");
        return 1;
    }
    return 0;
}

function validar_date(){
    var errors = 0;

    var element_fecha = $("#fecha");
    var fecha = element_fecha.val();
    fecha = fecha.split("/");

    var ano = fecha[2];
    var mes = fecha[1];
    var dia = fecha[0];

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

        mostrar_error(element_fecha, message);
        return 1;
    }
    return 0;
}

function validarEmail() {
    var element_email = $('#email');
    var email = element_email.val();

    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email)){
        return 0;
       // alert("La dirección de email " + valor + " es correcta.");
    } else {
        //alert("La dirección de email es incorrecta.");
        mostrar_error(element_email, "El email no es correcto");
        return 1;
    }
}

function mostrar_error(elemento ,text){

    var iDiv = document.createElement('div');
    iDiv.className = 'validate_ko';
    iDiv.innerHTML = text;
    elemento.parent().append(iDiv);
    elemento.attr("class","error");
}