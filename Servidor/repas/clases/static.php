<?php

class Cadena{
	public static function mayusculas($cadena){
		return strtoupper($cadena);
	}
}

$cadena = 'Pepito';
$cadena = Cadena::mayusculas($cadena);

print $cadena;