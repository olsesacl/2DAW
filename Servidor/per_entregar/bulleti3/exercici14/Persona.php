<?php

/**
 * Confeccionar una clase Persona que tenga como atributos el nombre y la
 * edad. El constructor recibe los datos para inicializar dichos atributos. Otro
 * método imprime los datos.
 * Plantear una segunda clase Empleado que herede de la clase Persona.
 * Añadir un atributo sueldo. El constructor recibe los tres atributos de la
 * clase Empleado. Llamar al constructor de la clase padre para inicializar
 * los atributos nombre y edad del Empleado.
 * Definir un objeto de la clase Persona y llamar a sus métodos. También
 * crear un objeto de la clase Empleado y llamar a sus métodos.
 */
class Persona
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