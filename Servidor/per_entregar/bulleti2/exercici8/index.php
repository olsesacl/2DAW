<?php
/**
    8) Realizar una función que calcule la edad . La función recibirá como parámetro el año de nacimiento en formato
    “dd/mm/yyyy” .
    a) Ejemplo:
    b) $fechanacimiento=”03/05/1978”;
    anyos=CalculaEdad($fechadenacimiento);
    Echo “La edad es $anyos”; ***
    (***) Hay que utilizar la función substr .
    Ejemplo :
    substr(“01:42:43”,0,2) = “01”
    substr(“01:42:43”,3,2) =”42”
 */

$fechadenacimiento="03/05/1978";

$anyos = CalculaEdad($fechadenacimiento);

print "Fecha introducida $fechadenacimiento<br>";

print "La edad es $anyos";

function CalculaEdad($fecha){

    //dades que ens pasen
    $dia = substr($fecha, 0, 2);
    $mes = substr($fecha, 3, 2);
    $any = substr($fecha, 6,4);

    $t=time();
    $t =(date("d-m-Y",$t));

    //dades del moment actual
    $d = substr($t, 0, 2);
    $m = substr($t, 3, 2);
    $a = substr($t, 6,4);

    $edad = $a - $any;

    //comprobamos mes para saber si ya ha cumplido los años o aun no
    if($mes > $m){
        $edad--;

    }else if($mes == $m){
        //si el mes es el mismo hay que comprobar el dia
        if($dia > $d){
            $edad--;
        }
    }

    return $edad;

}