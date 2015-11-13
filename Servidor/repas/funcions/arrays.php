<?php

$color = array('Rojo'=>101, 'Verde'=>51, 'Amarillo'=>251);

print $color['Rojo'];

print "Mostrando solo valor de los colores<br>";
foreach($color as $valor){
	print $valor."<br>";
}

print "Mostramos clave y calor<br>";

foreach($color as $key => $valor){
	print "clave: $key  valor: $valor <br>";
}

print "medidas <br>";
$medidas = array(10, 25, 12);

print $medidas[0];

print "<br>mostramos todas las medidas <br>";

for($i = 0; $i < count($medidas); $i++){
	print $medidas[$i]."<br>";
}

print "<br><br><br><br><br>EXPLODE<br>";

$fecha = date('Y/m/d');

print "fecha: ".$fecha."<br>";

$array_fecha = explode('/', $fecha);

$any = $array_fecha[0];
$mes = $array_fecha[1];
$dia = $array_fecha[2];

print "Any: $any Mes: $mes Dia: $dia";

