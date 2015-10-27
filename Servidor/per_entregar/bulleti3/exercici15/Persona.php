<?php

/**
 * Confeccionar una clase abstracta Persona que tenga como atributos el
 * nombre y la edad. Definir como responsabilidades un método que cargue
 * los datos personales y otro que los imprima.
 * Plantear una segunda clase Empleado que herede de la clase Persona.
 * Añadir un atributo sueldo y los métodos de cargar el sueldo e imprimir su
 * sueldo.
 * Definir un objeto de la clase Persona y ver que error produce. También
 * crear un objeto de la clase Empleado y llamar a sus métodos.
 */
abstract class Persona
{
    protected $nombre;
    protected $edad;

    public function __construct($nombre = '', $edad = ''){

        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    public function update($nombre, $edad){

        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    public function show(){
        print "Nombre: ". $this->nombre." edad: ".$this->edad."</br>";
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getEdad()
    {
        return $this->edad;
    }

    public function setEdad($edad)
    {
        $this->edad = $edad;
    }


}
class Empleado extends Persona{

    private $sueldo;

    public function __construct($nombre = '', $edad = '', $sueldo = ''){

        parent::update($nombre, $edad);
        $this->sueldo = $sueldo;
    }

    public function update($nombre, $edad, $sueldo){

        parent::update($nombre, $edad);
        $this->sueldo = $sueldo;
    }

    public function show(){
        print "Nombre: ". $this->nombre." edad: ".$this->edad." Sueldo: ".$this->sueldo."</br>";
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