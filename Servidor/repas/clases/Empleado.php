<?php

class Empleado {

	private $nombre;
	private $sueldo;

	public function __construct($nombre, $sueldo = 1000) {
		$this->nombre = $nombre;
		$this->sueldo = $sueldo;
	}

	public function imprimir(){
		print "El nombre es: ".$this->nombre." y el sueldo: ".$this->sueldo;
	}

}

$empleado1 = new Empleado("Luis", 2500);
$empleado1->imprimir();

print "<br>";

$empleado2 = new Empleado("Pepe");
$empleado2->imprimir();