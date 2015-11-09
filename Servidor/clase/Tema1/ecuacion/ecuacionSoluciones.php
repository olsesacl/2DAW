<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$a = $_POST["a"];
$b = $_POST["b"];
$c = $_POST["c"];
$disc;
echo "Los valores son $a $b $c<br />";

$disc = pow($b,2) - 4 * $a * $c;
if($disc < 0){
    echo "No tiene solucion";
} else if($disc == 0){
    echo "Solo tiene una solucion.<br />";
    echo "La solucion es: " . (-1 * $b / (2*$a));
} else {
    echo "Tiene dos soluciones.<br />";
    $x1 = ((-1 * $b) + sqrt($disc))/ (2*$a);
    $x2 = ((-1 * $b) - sqrt($disc))/ (2*$a);
    echo "Las soluciones son: $x1 y $x2";
}