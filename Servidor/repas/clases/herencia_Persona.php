<?php

class Persona {
	protected $nombre;
	protected $edad;

	public function __construct($nombre, $edad) {
		$this->nombre = $nombre;
		$this->edad = $edad;
	}

	function imprimir(){
		print "Nombre: ".$this->nombre ."<br>";
		print "Edad: " .$this->edad."<br>";
	}


	public function getEdad() {
		return $this->edad;
	}

	public function getNombre() {
		return $this->nombre;
	}

	public function setEdad($edad) {
		$this->edad = $edad;
	}

	public function setNombre($nombre) {
		$this->nombre = $nombre;
	}

}

class Empleado extends Persona{

	protected $sueldo;

	function __construct($nombre, $edad, $sueldo) {

		parent::__construct($nombre, $edad);
		$this->sueldo = $sueldo;
	}

	function imprimir(){
		parent::imprimir();
		print "El sueldo es: ".$this->sueldo."<br>";
	}

}

$persona1 = new Persona("Pepe", 25);
print "Datos de la persona<br>";
$persona1->imprimir();

print "<br>";
$empleado1 = new Empleado("Maria", 30,2000);
print "Datos del empleado<br>";
$empleado1->imprimir();