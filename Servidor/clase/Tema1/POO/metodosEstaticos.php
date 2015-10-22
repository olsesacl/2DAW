<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Cadena{
    public static function largo($cad){
        return strlen($cad);
    }
    public static function mayusculas($cad){
        return strtoupper($cad);
    }
    public static function minusculas($cad){
        return strtolower($cad);
    }
}

$c = "Hola";
echo "Cadena original: " . $c;
echo "<br />";
echo "Largo: " . Cadena::largo($c);
echo "<br />";
echo "Mayusculas: " . Cadena::mayusculas($c);
echo "<br />";
echo "Minusculas: " . Cadena::minusculas($c);