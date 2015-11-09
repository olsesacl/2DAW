<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$medidas = array(10,25,15,13);
$diasSemana = array("Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo");
echo "La longitud del array Medidas es " . count($medidas);
echo "<br />";

for ($i = 0; $i < count($medidas); $i++){
    echo $medidas[$i] . "<br />";
}

echo "La longitud del array diasSemana es " . count($diasSemana);
echo "<br />";

for ($i = 0; $i < count($diasSemana); $i++){
    echo $diasSemana[$i] . "<br />";
}

$alumnos = array("Nombre"=>"Pepe", "Apellidos" => "Garcia Ibañez", "Curso" => "2DAW", "Edad" => "20");
echo "<br />";echo "<br />";
echo $alumnos['Apellidos'];
echo "<br />";
foreach ($alumnos as $dato){
    echo "Ficha alumno: $dato";
}

echo "<br />";
foreach ($alumnos as $campo => $valor){
    
    echo "$campo : $valor<br />";
}