<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    echo "Servidor: " . $_SERVER['SERVER_NAME'];
    echo "<br /><br />";
    echo "Si accedes por --> http://localhost/?nombre=pepe<br>";
    echo "La variable \"nombre\" de la URL es: " . $_GET["nombre"];
    echo "<br /><br />";
    $a = 1;
    $b = 2;
    function Sum(){
        global $a;
        $b=3;
        $b = $a + $b;
        echo $b;
    }
    Sum();
    echo $b;

    
    
    
    