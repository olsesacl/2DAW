<?php
header("Content-type: text/xml");
$url = "http://xml.tutiempo.net/xml/" . $_POST['xml'] . ".xml";

$file_XML = file_get_contents($url);

print $file_XML;