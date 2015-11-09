<?php

/**
 * Confeccionar una clase Empleado, definir como atributos su nombre y
 * sueldo.
 * El constructor recibe como parámetros el nombre y el sueldo, en caso de
 * no pasar el valor del sueldo inicializarlo con el valor 1000.
 * Confeccionar otro método que imprima el nombre y el sueldo.
 * Crear luego dos objetos del la clase Empleado, a uno de ellos no enviarle
 * el sueldo.
 */
class Empleado
{
    private $name;
    private $sueldo;


    public function __construct($name = '', $sueldo = '1000')
    {
        $this->name = $name;
        $this->sueldo = $sueldo;
    }


    function inicializar($name, $sueldo)
    {
        $this->name = $name;
        $this->sueldo = $sueldo;
    }

    function print_values(){
        print "Nombre: ".$this->name.": sueldo ". $this->sueldo."<br/>";

    }

    //setters and getters
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
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