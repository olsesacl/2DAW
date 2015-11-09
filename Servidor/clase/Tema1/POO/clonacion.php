<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Persona {
    private $nombre;
    private $edad;
    
    public function  fijarNombreEdad($nom, $ed){
        $this->nombre = $nom;
        $this->edad = $ed;
    }
    public function getNombre(){
        
        return $this->nombre;
    }
    public function getEdad(){
        return $this->edad;
    }
}

$persona1 = new Persona();
$persona1->fijarNombreEdad("Juan", 20);
echo "Nombre: " . $persona1->getNombre() . "<br />";
echo "Edad: " . $persona1->getEdad() . "<br />";

echo "<br />";
echo "Referencia<br /> cambio X y tambien cambia persona1<br />"
. "----------------------------------------<br />";
$x = $persona1;
echo "Datos de la persona :"
    . $persona1->getNombre() . " - " . $persona1->getEdad(). "<br />";

$x->fijarNombreEdad("Anna", 25);
echo "Datos de la persona  :"
    . $persona1->getNombre() . " - " . $persona1->getEdad(). "<br />";


echo "<br />";
echo "Clone<br /> cambio persona2 y NO cambia persona1<br />"
. "----------------------------------------<br />";
$persona2 = clone($persona1);
$persona2->fijarNombreEdad("Pepito", 30);
echo "Datos de la persona :"
    . $persona1->getNombre() . " - " . $persona1->getEdad(). "<br />";
echo "Datos de la persona  :"
    . $persona2->getNombre() . " - " . $persona2->getEdad(). "<br />";