<?php

class Empleado
{
    private $name;
    private $sueldo;

    private $IMPUESTOS = 3000;


    public function __construct($name = '', $sueldo = '')
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
        print $this->name.": ";

        if($this->sueldo > $this->IMPUESTOS){
            print "Ha de pagar impuestos";
        } else {
            print "No ha de pagar impuestos";
        }
        print "<br>";

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