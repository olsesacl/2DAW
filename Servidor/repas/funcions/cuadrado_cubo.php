<?php

/**
 * @param $valor
 * @param $cuad
 * @param $cub
 */
function cuadrado_cubo($valor, &$cuad, &$cub){

	$cuad = pow($valor,2);
	$cub = pow($valor, 3);
}

$valor = 3;

cuadrado_cubo($valor, $cuad, $cub);

print "Valor es : $valor cuadrado es: ". $cuad. " y el cubo : ".$cub;