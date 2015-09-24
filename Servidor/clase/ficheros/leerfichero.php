<?php

$canal = fopen("datos.txt", r) or die("Problemas en la lectura del fichero");
$datos='';
 while($line=fgets($canal))
{ 
    $datos.=$line;
}
fclose($fp);

$datos = nl2br($datos);

print $datos;

?>
<a href="./leerfichero.php">Leer el fichero</a>