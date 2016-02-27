$(document).ready(function() {
    $(".fancybox").fancybox({
        padding: 0,

        openEffect : 'elastic',
        openSpeed  : 150,

        closeEffect : 'elastic',
        closeSpeed  : 150,
        helpers : {
            title: {
                overlay : null
            },
            overlay : {
                css : {
                    'background' : 'rgba(238,238,238,0.3)'
                }
            }
        },

        afterLoad : function() {
            this.title = 'Imagen ' + (this.index + 1) + ' de ' + this.group.length + (this.title ? ' - ' +
                this.title : '');
        }
    });
    $(".fancybox-altimetria").fancybox({
        padding: 0,

        openEffect : 'elastic',
        openSpeed  : 150,

        closeEffect : 'elastic',
        closeSpeed  : 150,
        helpers : {
            overlay : {
                css : {
                    'background' : 'rgba(238,238,238,0.3)'
                }
            }
        }
    });

    $.ajax({
        url: "./cargaselectXML.php",
        type:  'post',
        dataType: "xml",
        beforeSend: function() {
            $('#selector_ports option').remove();
            $('#selector_ports').append('<option>Cargando...</option>')
        },
        success: function(result){
            var puerto = $(result).find( "puerto" );
            puerto.each(function() {
                $('#selector_ports').append(
                    '<option value="'+ $(this).find('codigo').text() +'">'+
                    $(this).find('nombre').text() +
                    '</option>'
                );
            });
            $('#selector_ports option:first-child').remove();
            $('#selector_ports option:first-child').attr('selected','selected');
            cambiar_ports();
        }});


    $('#selector_ports').change(cambiar_ports);

});

function cambiar_ports(){

    var id =$('#selector_ports').val();

    var div_ports = $("#ports");
    //eliminem el contingut del div abans de replenar en les dades corresponents
    $("#ports").hide().html('');
    $("#ports").show();
    $("#ports").append($("<div>").css("display", "none"));
    $("#ports > div:last-child").addClass("cargando").text('Cargando').show();

    var dades = '';

    if(id == 1){

        $('#selector_ports option').each(function () {
            if($(this).val()!=1){
                mostrar($(this).val());
            }

        });

    } else {
        mostrar(id);
    }

}
function mostrar(id){
    var dades;

    $.ajax({
        url: "./cargaportsXML.php",
        type:  'post',
        data : { seleccion : id },
        dataType: "xml",
        success: function(result){
            var i = 1;
            dades = '<table><tr><td class="title" colspan="6">' + $(result).find("nombre_zona").text() + '</td></tr>';
            dades +='<tr><th>Nom</th><th>Distancia</th><th>Altura</th><th>Galeria</th><th>Altimetria</th><th>Más datos</th></tr>';
           $(result).find( "puerto" ).each(function() {
                    dades +="<tr data-tooltip='" + $(this).find("misatge").text() + "' data-color='" + $(this).find("color_misatge").text() + "' title=''>";
                    dades +="<td>" + $(this).find("nom").text() + "</td>";
                    dades +="<td>" + $(this).find("distancia").text() + "km</td>";
                    dades +="<td>" + $(this).find("altura").text() + "m</td>";

                    //fotos
               var dirfoto = "./images/ports/"+ id +"/"+ i +"/";

                   $.ajax({
                       url: "./cargarimagenes.php",
                       type:  'post',
                       data : { dir : dirfoto },
                       dataType: "xml",
                       async:false,
                       success: function(fotos) {
                           var first = 1;
                           var foto_dades='';
                           $(fotos).find( "foto" ).each(function() {
                               if(first == 1){
                                   foto_dades +="<td><a href='"+ dirfoto + $(this).text()+"' class='fancybox' data-fancybox-group='fotos_"+ id +"_"+ i +"' data-fancybox-title='Unas cuantas fotos para disfrutar'><img src='./images/galerias.png'></a><div>";
                                   first =0;
                               } else {
                                   foto_dades +="<div href='"+ dirfoto + $(this).text()+"' class='fancybox' data-fancybox-group='fotos_"+ id +"_"+ i +"' data-fancybox-title='Unas cuantas fotos para disfrutar'></div>";
                               }
                           });

                           dades += foto_dades;
                       }
                   });

                    dades +="</div>";

                    dades +="</td>";
                    dades += "<td><a class='fancybox-altimetria'  href='./images/ports/"+ id +"/"+ i +"/altimetria.jpg'><img src='./images/altimetria.png'></a></td> ";
                    dades +="<td><span class='mostrar_mas' onclick=\"$('#text_"+ id +"_"+ i +"').fadeToggle('slow');\">Mostrar más</span></td>";
                    dades +="</tr>";
                   dades +="<tr id='text_"+ id +"_"+ i +"' style='display:none;'><td colspan='6' class='text_port'>"+ $(this).find("datos").text() +"</td></tr>";
                    i++;
                });
                dades +="</table>"

            $("#ports .cargando").fadeOut("fast").remove();
            $("#ports").append($("<div>").css("display", "none"));
            $("#ports > div:last-child").html(dades).slideDown("slow")



            $('[data-tooltip]').each(function () {

                var clase = $(this).data('color');

                $(this).tooltip({
                    tooltipClass: clase,
                    position: {
                        my: "right center",
                        at: "left+10 center",

                    },
                    content: function () {
                        return $(this).data('tooltip');
                    }


                });
            });
        }});



}
