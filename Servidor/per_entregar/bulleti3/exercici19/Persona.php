<?php

/**
 *  Crear la clase Persona y cuando se clone un objeto de dicha clase
 *  almacenar en el atributo edad la edad actual más uno.
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