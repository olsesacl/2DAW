<?php


// r es para abrir en modo lectura
$fp = fopen("datos.txt", 'r');

//mientras no sea final de fichero
while(!feof($fp)){
	$linea = fgets($fp);
	$linea = nl2br($linea); //per a fer els salts de linea
	print $linea;
}

