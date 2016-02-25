<?php
header("Content-type: text/xml");
$url = "http://www.aemet.es/xml/municipios/localidad_" . $_POST['xml'] . ".xml";

$file_XML = file_get_contents($url);

print $file_XML;