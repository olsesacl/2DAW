<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function suma ($x, $y){
    $suma = $x + $y;
    return $suma;
}

function incrementa (&$x){
    $x = $x + 28;
}



$a = 5;
$b = 10;
echo "La suma es " . suma($a, $b);

echo "<br /><br />";
$a = 1;
echo "El valor de \$a antes de incrementar es: $a";
echo "<br /><br />";
incrementa($a);
echo "El valor de \$a despues de incrementar es $a";