<?php

/**
 * Confeccionar una clase Persona que tenga como atributos el nombre y la
 * edad. Definir como responsabilidades un método final que cargue los
 * datos personales. Otro método debe imprimir dichos datos personales.
 * Plantear una segunda clase Empleado que herede de la clase Persona.
 * Definir la clase Persona con el modificador Final. Añadir un atributo
 * sueldo y los métodos de cargar el sueldo e imprimir su sueldo.
 * Definir un objeto de la clase Persona y llamar a sus métodos. También
 * crear un objeto de la clase Empleado y llamar a sus métodos.
 */
class Persona
{
    //no he declarado la clase persona como final porque sino no funcionara la de empleado
    protected $nombre;
    protected $edad;

    public function __construct($nombre = '', $edad = ''){

        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    public final function update($nombre, $edad){

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