<?php
/*
 * Parametros por referencia
 *
 * */


function incrementa_por_referencia(&$a){
	$a++;
}

function incrementa_por_valor($a){
	$a++;
}

$a = 1;
incrementa_por_referencia($a);

print "El valor de a por referencia es: ".$a;

print "<br>";
$a = 1;
incrementa_por_valor($a);

print "El valor de a por referencia es: ".$a;