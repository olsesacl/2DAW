<?php
/**
 * Created by PhpStorm.
 * User: JuanJesus
 * Date: 29/02/2016
 * Time: 8:22
 */

header("Content-Type: application/xml");

//LOS PIRINEOS
$ports["2"]["port"]["1"] = "Tourmalet";
$ports["2"]["port"]["2"] = "Envalira";
$ports["2"]["port"]["3"] = "Aubisque";

//LOS ALPES
$ports["3"]["port"]["4"] = "Alpe d'Huez";
$ports["3"]["port"]["5"] = "Stelvio";
$ports["3"]["port"]["6"] = "Passo di Gavia";

//RESTO DEL MUNDO
$ports["4"]["port"]["7"] = "Mont Ventoux";
$ports["4"]["port"]["8"] = "Angliru";
$ports["4"]["port"]["9"] = "Lagos de Covadonga";

$seleccion = trim($_POST["elegidos"]);


if ($seleccion == 1){
    for($i = 2;$i<=4;$i++){
        $ports_select = $ports[$i];
        foreach($ports_select["port"] as $codigo => $nombre) {
            $elementos_xml[] = "<puerto><codigo>".$codigo."</codigo><nombre>".$nombre."</nombre></puerto>";
        }
    }
}else{
    $ports_select = $ports[$seleccion];
    foreach($ports_select["port"] as $codigo => $nombre) {
        $elementos_xml[] = "<puerto><codigo>".$codigo."</codigo><nombre>".$nombre."</nombre></puerto>";
    }
}

echo "<puertos>\n".implode("\n", $elementos_xml)."</puertos>";
?>