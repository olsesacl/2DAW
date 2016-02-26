<?php
header("Content-Type: application/xml");

$puertos["1"] = "Tots els ports";
$puertos["2"] = "Pirineus";
$puertos["3"] = "Alps";
$puertos["4"] = "Resta de cordilleres";




foreach($puertos as $codigo => $nombre) {
  $elementos_xml[] = "<puerto>\n<codigo>$codigo</codigo>\n<nombre>".$nombre."</nombre>\n</puerto>";
}

echo "<puertos>\n".implode("\n", $elementos_xml)."\n</puertos>"

?>
