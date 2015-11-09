<?php

/**
 *   Confeccionar una clase que contenga un constructor y un destructor.
 *   Hacer que cada método imprima un mensaje en la página indicando que
 *   se a ejecutado dicho método.
 */
class Trabajador
{
    protected $nombre;
    protected $sueldo;

    public function __construct($nombre, $sueldo){

        $this->nombre = $nombre;
        $this->sueldo = $sueldo;
        print "Se esta ejecutando el constructor<br>";
    }

    public function __destruct(){
        print "Se esta ejecutando el destructor";
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