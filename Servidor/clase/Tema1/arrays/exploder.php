<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$fecha = date('d/m/Y');
echo $fecha;
$fecha2 = explode("/", $fecha);
echo "<br />";
var_dump($fecha2);
echo "<br />";

print_r($fecha2);

$dia = $fecha2[0];
$mes = $fecha2[1];
$year = $fecha2[2];
echo "<br />";
echo "El dia es $dia, el mes es $mes y el año es $year";

$horaActual = date('H:i:s');
$h = explode(":", $horaActual);

$hora = $h[0];
$min = $h[1];
$sec = $h[2];
echo "<br />";

echo "La hora es $hora, el minuto es $min, el segundo es $sec";
