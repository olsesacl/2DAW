<?php

/**
 *  Plantear una clase Calculadora que contenga cuatro métodos estáticos
 *  (sumar, restar, multiplicar y dividir) estos métodos reciben dos valores
 */
class Calculadora
{

    static function sumar($x, $y){
        return $x+$y;
    }
    static function restar($x, $y){
        return $x-$y;
    }
    static function multiplicar($x, $y){
        return $x*$y;
    }
    static function dividir($x, $y){
        return $x/$y;
    }

}