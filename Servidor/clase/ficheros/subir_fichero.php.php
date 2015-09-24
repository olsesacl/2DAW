<?php

$nombre = $_POST['nombre'];
$description = $_POST['description'];

$canal = fopen("datos.txt", a) or die("Problemas en la creacion del fichero");

fputs($canal, $nombre);
fputs($canal,"\n");

fputs($canal, $description);
fputs($canal,"\n");

fputs($canal, "--------------------------------------\n");

fclose($canal);

echo  "Los datos se han guardado con exito !!";
?>
<a href="./leerfichero.php">Leer el fichero</a>

