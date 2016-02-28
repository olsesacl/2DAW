var temporizador;
$(document).ready(function () {
    $('#navlist li').click(cambiar_pagina);

    $('#contenido').load($('#active').attr("data-url")+"?nocache="+Math.random());
    include("./js/"+$('#active').attr("data-js"));
});

function cambiar_pagina(){
    $('#contenido').load($(this).attr("data-url")+"?nocache="+Math.random());
    $('#active').removeAttr('id');
    $(this).attr('id','active');

    //esto lo usamos para limpiar los tempirizadores que tenemos en los otros js
    clearTimeout(temporizador); temporizador = false;
    include("./js/"+$(this).attr("data-js"));


}

function include(archivo) {
    $.ajax({
        url: archivo+"?nocache="+Math.random(),
        success: function(datos) {
            $('#script_carga').text(datos);
        }
    })
        .done(function(){
            carga();
        });
}
