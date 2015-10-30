<?php

/**
 * Plantear una clase Trabajador. Definir como atributos su nombre y
 * sueldo. Declarar un método que retorne el sueldo y otro el nombre.
 * Plantear una subclase Empleado y otra subclase Gerente.
 * Crear un vector con 3 empleados y 2 gerentes. Mostrar el nombre y
 * sueldo del gerente que gana más en la empresa
 */
abstract class Trabajador
{
    protected $nombre;
    protected $sueldo;

    public function __construct($nombre, $sueldo){

        $this->nombre = $nombre;
        $this->sueldo = $sueldo;
    }

    function show(){
        print "Nombre: ".$this->nombre." Sueldo: ".$this->sueldo."</br>";
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getSueldo()
    {
        return $this->sueldo;
    }

    public function setSueldo($sueldo)
    {
        $this->sueldo = $sueldo;
    }



}
class Empleado extends Trabajador{

    public function __construct($nombre, $sueldo){

        parent::__construct($nombre, $sueldo);
    }


}

class Gerente extends Trabajador{

    public function __construct($nombre, $sueldo){

        parent::__construct($nombre, $sueldo);
    }

}