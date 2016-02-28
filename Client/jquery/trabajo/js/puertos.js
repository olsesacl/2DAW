function carga(){
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

};

function cambiar_ports(){

    var id =$('#selector_ports').val();

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
                    dades +="<tr class='tooltip' title=\"" + $(this).find("misatge").html() + "\" data-color='" + $(this).find("color_misatge").text() + "' title=''>";
                    dades +="<td>" + $(this).find("nom").text() + "</td>";
                    dades +="<td>" + $(this).find("distancia").text() + "km</td>";
                    dades +="<td>" + $(this).find("altura").text() + "m</td>";

                    //fotos
               //primero ponemos el td vacio, el cual rellenaremos con el ajax
               dades += "<td data-fotos='fotos_"+id+"_"+i+"'></td>";
               var dirfoto = "./images/ports/"+ id +"/"+ i +"/";
                var j = i;
                   $.ajax({
                       url: "./cargarimagenes.php",
                       type:  'post',
                       data : { dir : dirfoto },
                       dataType: "xml",
                       success: function(fotos) {
                           var first = 1;
                           var foto_dades='';
                           $(fotos).find( "foto" ).each(function() {
                               if(first == 1){
                                   foto_dades +="<a href='"+ dirfoto + $(this).text()+"' class='fancybox' data-fancybox-group='fotos_"+ id +"_"+ j +"' data-fancybox-title='"+$(this).text().split(".")[0].split("-")[1]+"'><img src='./images/galerias.png'></a><div>";
                                   first =0;
                               } else {
                                   foto_dades +="<div href='"+ dirfoto + $(this).text()+"' class='fancybox' data-fancybox-group='fotos_"+ id +"_"+ j +"' data-fancybox-title='"+$(this).text().split(".")[0].split("-")[1]+"'></div>";
                               }
                           });
                           foto_dades +="</div>";

                           //aqui rellenamos el td con toda la información de las fotos
                           $("td[data-fotos='fotos_"+id+"_"+j+"']").html(foto_dades);
                       }
                   });

                    dades += "<td><a class='fancybox-altimetria'  href='./images/ports/"+ id +"/"+ i +"/altimetria.jpg'><img src='./images/altimetria.png'></a></td> ";
                    dades +="<td><span class='mostrar_mas' data-ref=\"#text_"+ id +"_"+ i +"\">Mostrar más</span></td>";
                    dades +="</tr>";
                   dades +="<tr><td colspan='6' class='text_port'><div id='text_"+ id +"_"+ i +"' style='display:none;'>"+ $(this).find("datos").text() +"</div></td></tr>";
                    i++;
                });
                dades +="</table>"

            $("#ports .cargando").fadeOut("fast").remove();
            $("#ports").append($("<div>").css("display", "none"));
            $("#ports > div:last-child").html(dades).slideDown("slow");

            $(".mostrar_mas").unbind("click").click(function(){
                var variable = $(this);

                $($(this).attr("data-ref")).slideToggle('slow', function(){
                    if(variable.text()=="Mostrar más"){
                        variable.text("Mostrar menos");
                    } else {
                        variable.text("Mostrar más");
                    }
                });

            });

           $('.tooltip[data-color!=red]').tooltipster({
                multiple: true,

            });
            $('.tooltip[data-color=red]').tooltipster({
                multiple: true,
                theme: 'tooltipster-red',
                animation:"grow"

            });
        }});
}
