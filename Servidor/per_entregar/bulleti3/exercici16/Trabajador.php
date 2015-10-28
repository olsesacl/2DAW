<?php

/**
 * Plantear una clase abstracta Trabajador. Definir como atributo su nombre
 * y sueldo. Declarar un método abstracto: calcularSueldo. Definir otro
 * método para imprimir el numbre y su sueldo.
 * Plantear una subclase Empleado. Definir el atributo $horasTrabajadas,
 * $valorHora. Para calcular el sueldo tener en cuenta que se le paga 3.50
 * la hora.
 * Plantear una clase Gerente que herede de la clase Trabajador. Para
 * calcular el sueldo tener en cuenta que se le abona un 10% de las
 * utilidades de la empresa.
 */
abstract class Trabajador
{
    public static $todos_sueldos = 0;
    protected $nombre;
    protected $sueldo;

    public function __construct($nombre){

        $this->nombre = $nombre;
    }

    abstract function calcularSueldo();
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

    protected $horasTrabajadas;
    private $valorHora = 3.50;

    public function __construct($nombre, $horas){

        parent::__construct($nombre);
        $this->horasTrabajadas = $horas;
    }


    function calcularSueldo(){

        $this->sueldo = $this->valorHora * $this->horasTrabajadas;
        parent::$todos_sueldos += $this->sueldo;
    }

    public function getHorasTrabajadas()
    {
        return $this->horasTrabajadas;
    }

    public function setHorasTrabajadas($horasTrabajadas)
    {
        $this->horasTrabajadas = $horasTrabajadas;
    }


}

class Gerente extends Trabajador{

    public function __construct($nombre){

        parent::__construct($nombre);
    }

    function calcularSueldo(){

        $this->sueldo = parent::$todos_sueldos * 0.10;

    }
}