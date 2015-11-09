<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function cuadradoPuk($valor, &$cuadrado, &$cubo){
    $cuadrado = pow($valor, 2);
    $cubo = pow($valor, 3);
}

$valor = 100;
$cuadrado = 3;
$cubo = 5;
echo "Los valores antes de la llamada a "
. "la funcion son $cuadrado y $cubo";
echo "<br /><br />";

cuadradoPuk($valor, $cuadrado, $cubo);
echo "El cuadrado es $cuadrado y el cubo es $cubo";