<?php
/**
 * Created by PhpStorm.
 * User: JuanJesus
 * Date: 29/02/2016
 * Time: 8:22
 */

header("Content-Type: application/xml");

//LOS PIRINEOS
$ports["01"]["nombre_zona"] = "Pirineos";

$ports["01"]["port"]["1"]["nombre"] = "Tourmalet";
$ports["01"]["port"]["1"]["distancia"] = "23";
$ports["01"]["port"]["1"]["altura"] = "2115";
$ports["01"]["port"]["1"]["imagen"] = "tourmalet";
$ports["01"]["port"]["1"]["color_mensaje"] = "azul";
$ports["01"]["port"]["1"]["mensaje"] = "Abierto de Junio a Septiembre. El resto del año está cerrado al tráfico por presencia de nieve";
$ports["01"]["port"]["1"]["datos"] = "El Col du Tourmalet, o simplemente Tourmalet, es un paso localizado en el centro de los Pirineos franceses. Tiene una altitud de 2.115 metros sobre el nivel del mar.";

$ports["01"]["port"]["2"]["nombre"] = "Envalira";
$ports["01"]["port"]["2"]["distancia"] = "23";
$ports["01"]["port"]["2"]["altura"] = "2404";
$ports["01"]["port"]["2"]["imagen"] = "envalira";
$ports["01"]["port"]["2"]["color_mensaje"] = "rojo";
$ports["01"]["port"]["2"]["mensaje"] = "Extremar les precaucions amb les boires repentines, visibilitat molt defectuosa";
$ports["01"]["port"]["2"]["datos"] = "El puerto de Envalira es el puerto de montaña con carretera más alto de los Pirineos, con 2.409 metros de altura sobre el nivel del mar, situado en Andorra entre las localidades de Soldeu y Pas de la Casa y el único acceso desde Andorra hacia Francia.";

$ports["01"]["port"]["3"]["nombre"] = "Aubisque";
$ports["01"]["port"]["3"]["distancia"] = "22";
$ports["01"]["port"]["3"]["altura"] = "1709";
$ports["01"]["port"]["3"]["imagen"] = "aubisque";
$ports["01"]["port"]["3"]["color_mensaje"] = "rojo";
$ports["01"]["port"]["3"]["mensaje"] = "Precaución con los osos salvajes";
$ports["01"]["port"]["3"]["datos"] = "El Col d'Aubisque o puerto del Aubisque (en occitano, Cth d'Aubisca), también conocido simplemente como Aubisque, es un puerto de montaña de los Pirineos situado a 1.709 msnm, en el departamento de Pirineos Atlánticos, en la región francesa de Aquitania. Se encuentra a unos 30 km al sur de Pau y Tarbes.";

//LOS ALPES
$ports["02"]["nombre_zona"] = "Alpes";

$ports["02"]["port"]["1"]["nombre"] = "Alpe d'Huez";
$ports["02"]["port"]["1"]["distancia"] = "14";
$ports["02"]["port"]["1"]["altura"] = "1845";
$ports["02"]["port"]["1"]["imagen"] = "huez";
$ports["02"]["port"]["1"]["color_mensaje"] = "rojo";
$ports["02"]["port"]["1"]["mensaje"] = "Extremar las precauciones con las nieblas repentinas, visibilidat muy defectuosa";
$ports["02"]["port"]["1"]["datos"] = "Alpe d'Huez es una montaña de los Alpes franceses de 1850 m de altitud. La estación de esquí presente en dicha montaña se comenzó a construir en 1930. En 1936, se instala el primer remonte mecánico de tipo telesquí. Alpe d'Huez debe gran parte de su fama a su relación con la carrera ciclista del Tour de Francia.";

$ports["02"]["port"]["2"]["nombre"] = "Stelvio";
$ports["02"]["port"]["2"]["distancia"] = "22";
$ports["02"]["port"]["2"]["altura"] = "2758";
$ports["02"]["port"]["2"]["imagen"] = "stelvio";
$ports["02"]["port"]["2"]["color_mensaje"] = "azul";
$ports["02"]["port"]["2"]["mensaje"] = "Abierto de Junio a Septiembre. El resto del año está cerrado al tráfico por presencia de nieve";
$ports["02"]["port"]["2"]["datos"] = "El Paso Stelvio (en italiano: Passo dello Stelvio, alemán: Stilfser Joch), situado en Italia, a 2.757 msnm, es el paso de montaña pavimentado de mayor elevación de los Alpes orientales, y el segundo más alto de los Alpes, únicamente por detrás del Col de l'Iseran (2770 msnm). Debe parte de su fama a ser uno de los puertos más duros de la competición ciclista más importante del país, el Giro de Italia. Su longitud es de 24 km, con un desnivel medio del 7,6%,1 y debe su nombre a la localidad próxima de Stelvio.";

$ports["02"]["port"]["3"]["nombre"] = "Passo di Gavia";
$ports["02"]["port"]["3"]["distancia"] = "16";
$ports["02"]["port"]["3"]["altura"] = "2618";
$ports["02"]["port"]["3"]["imagen"] = "gavia";
$ports["02"]["port"]["3"]["color_mensaje"] = "azul";
$ports["02"]["port"]["3"]["mensaje"] = "Abierto de Junio a Septiembre. El resto del año está cerrado al tráfico por presencia de nieve";
$ports["02"]["port"]["3"]["datos"] = "El Paso Gavia (en italiano: Passo di Gavia), es un paso de montaña ubicado en los Alpes Róticos meridionales a 2.621 msnm. Es uno de los pasos de montaña más altos de Europa y se encuentra en la frontera de las provincias de Sondrio y Brescia (Lombarda), conectando Ponte di Legno con Bormio, a través de la carretera estatal 300.";

//RESTO DEL MUNDO
$ports["03"]["nombre_zona"] = "Resto del mundo";

$ports["03"]["port"]["1"]["nombre"] = "Mont Ventoux";
$ports["03"]["port"]["1"]["distancia"] = "22";
$ports["03"]["port"]["1"]["altura"] = "1912";
$ports["03"]["port"]["1"]["imagen"] = "ventoux";
$ports["03"]["port"]["1"]["color_mensaje"] = "azul";
$ports["03"]["port"]["1"]["mensaje"] = "Posibilidad de vientos extremos en la cima";
$ports["03"]["port"]["1"]["datos"] = "El Mont Ventoux es una montaña de la región de Provenza, en el sureste de Francia, a unos 20 kilómetros al noreste de Carpentras. En la vertiente norte, la montaña limita con el departamento de Drome. Es con diferencia la montaña más alta de la región y se le ha dado el nombre de gigante de la Provenza.";

$ports["03"]["port"]["2"]["nombre"] = "Angliru";
$ports["03"]["port"]["2"]["distancia"] = "12";
$ports["03"]["port"]["2"]["altura"] = "1555";
$ports["03"]["port"]["2"]["imagen"] = "angliru";
$ports["03"]["port"]["2"]["color_mensaje"] = "azul";
$ports["03"]["port"]["2"]["mensaje"] = "Este puerto tiene rampas por encima del 23%, la probabilidad de poner el pie en tierra es alta";
$ports["03"]["port"]["2"]["datos"] = "El Angliru (en asturiano: L'Angliru) es un puerto de montaña del Principado de Asturias, en España. Es una zona de pastos y abrevadero de ganado, que recibe el nombre por sinócdoque del lago El Angliru y que está situada en el corazón de la sierra del Aramo, en el concejo de Riosa (Asturias, España).";

$ports["03"]["port"]["3"]["nombre"] = "Lagos de Covadonga";
$ports["03"]["port"]["3"]["distancia"] = "14";
$ports["03"]["port"]["3"]["altura"] = "1134";
$ports["03"]["port"]["3"]["imagen"] = "covadonga";
$ports["03"]["port"]["3"]["color_mensaje"] = "rojo";
$ports["03"]["port"]["3"]["mensaje"] = "Extremar las precauciones con las nieblas repentinas, visibilidad muy defectuosa";
$ports["03"]["port"]["3"]["datos"] = "El conjunto de los lagos de Covadonga (llamados Llagos de Cuadonga o Llagos d'Enol en asturiano) está formado por dos pequeños lagos, el Enol y el Ercina de origen glacial situados en la parte asturiana del Parque Nacional de los Picos de Europa, en el macizo occidental de dicha cadena montañosa. Existe un tercer lago, el Bricial, que sólo tiene agua durante el deshielo, pero también pertenece al conjunto.1 En Asturias son conocidos simplemente como los lagos.";

$seleccion = trim($_POST["elegidos"]);

$ports_select = $ports[$seleccion];

$elementos_xml[]="<nombre_zona>" . $ports_select["nombre_zona"] ."</nombre_zona>";

foreach($ports_select["port"] as $allports) {
    $elementos_xml[] = "<puerto>";
    foreach($allports as $tag => $dato) {
        $elementos_xml[] = "<".$tag.">" . $dato . "</".$tag.">";
    }
    $elementos_xml[] = "</puerto>";
}
echo "<zona>\n".implode("\n", $elementos_xml)."</zona>";
?>