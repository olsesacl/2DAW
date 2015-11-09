<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

abstract class Trabajador {
    protected $nombre;
    protected $sueldo;
    
    public function __construct($nom, $su) {
        $this->nombre = $nom;
        $this->sueldo = $su;
    }
    
    public function getSueldo(){
        return $this->sueldo;
    }
}

class Empleado extends Trabajador {
    
    
}

class Gerente extends Trabajador{
}
$vec[] = new Empleado("Juan", 1200);
$vec[] = new Empleado("Anna", 1000);
$vec[] = new Empleado("Carlos", 1100);
$vec[] = new Gerente("Jorge", 2500);
$vec[] = new Gerente("Miguel", 3000);

$suma1 = 0;
$suma2 = 0;

for ($i = 0; $i < count($vec);$i++){
    if ($vec[$i] instanceof Empleado){
        $suma1 += $vec[$i]->getSueldo();
    } else if($vec[$i] instanceof Gerente){
        $suma2 += $vec[$i]->getSueldo();
    }
}

echo "El total de sueldos de empleados es $suma1";
echo "<br />";
echo "El total de sueldos de gerentes es $suma2";
