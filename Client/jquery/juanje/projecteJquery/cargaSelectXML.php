<?php
/**
 * Created by PhpStorm.
 * User: JuanJesus
 * Date: 01/03/2016
 * Time: 9:59
 */

header("Content-Type: application/xml");
$puertos["1"] = "Todos los puertos";
$puertos["2"] = "Pirineos";
$puertos["3"] = "Alpes";
$puertos["4"] = "Resto de cordilleras";

foreach($puertos as $codigo => $nombre) {
    $elementos_xml[] = "<puerto>\n<codigo>$codigo</codigo>\n<nombre>".$nombre."</nombre>\n</puerto>";
}

echo "<puertos>\n".implode("\n", $elementos_xml)."\n</puertos>"

?>