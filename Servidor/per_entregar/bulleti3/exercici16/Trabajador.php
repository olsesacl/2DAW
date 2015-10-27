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
    protected $nombre;
    protected $sueldo;

    abstract function calcularSueldo();
    function show(){
        print "Nombre: ".$this->nombre." Sueldo: ".$this->sueldo."</br>";
    }

}
class Empleado extends Trabajador{

    protected $horasTrabajadas;
    private $valorHora = 3.50;

    function calcularSueldo(){

        $this->sueldo = $this->valorHora * $this->horasTrabajadas;
    }
}

class Gerente extends Trabajador{

    function calcularSueldo(){


    }
}