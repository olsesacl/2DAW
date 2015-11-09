<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$fichero = fopen("datos.txt", "r") or die ("No se puede leer el fichero.");

while(!feof($fichero)){
    $linea = fgets($fichero);
    
    $lineaSalto = nl2br($linea);
    // nl2br() --> transforma el \n en <br />
    echo $lineaSalto;
}
fclose($fichero);