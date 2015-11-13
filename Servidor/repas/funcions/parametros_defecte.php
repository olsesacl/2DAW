<?php
function muestra_nombre($nombre, $titulo = 'Señor'){
	print "Estimado $titulo $nombre<br>";
}

$nombre = 'Pepe';

muestra_nombre($nombre);

$nombre = 'Maria';
$titulo = 'Señorita';
muestra_nombre($nombre, $titulo);