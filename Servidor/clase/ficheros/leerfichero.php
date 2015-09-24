<?php

$canal = fopen("datos.txt", r) or die("Problemas en la lectura del fichero");

while($line=fgets($fp,"\n"))
{ 
    
}
fclose($fp);

echo  "Los datos se han guardado con exito !!";
?>
<a href="./leerfichero.php">Leer el fichero</a>