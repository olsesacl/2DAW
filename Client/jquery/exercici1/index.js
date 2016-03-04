$( document ).ready(function() {
    $('#selector select').change(cambiar_clase);
});

function cambiar_clase(){
    var clase_select = $('#selector input:checked');
    //var mostrar='';

    for(var i = 0 ; i < clase_select.length; i++) {
        //mostrar += seleccionados.val() +' ';

        //recorremos todos los elementos seleccionados
        $(clase_select[i].value).each(function() {
            //ahora comprobamos si tienen el attributo data-class que crearemos para guardar la clase por defecto
            if($(this).data('data-class')== undefined){

                if($(this).attr("class")== undefined){

                    $(this).data('data-class','');

                }else {
                    $(this).data('data-class', $(this).attr("class"));
                }

            }

            //ahora añadimos a la clase base la clase elegida
            $(this).attr("class", $(this).data('data-class')+ ' ' + $('#selector select').val());
        });

    }

    //alert(mostrar);

}