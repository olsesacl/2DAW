<?php


abstract class Trabajador {
	protected $nombre;
	protected $sueldo;

	function __construct($nombre) {
		$this->nombre = $nombre;
	}

	public function imprimir(){
		print "Nombre: ".$this->nombre . "<br>Sueldo: ".$this->sueldo."<br>";
	}

	public abstract function calcularsueldo();

}

class Empleado extends Trabajador{

	protected $valorHora;
	protected $horasTrabajadas;

	public function __construct($nombre, $valorHoras, $horasTrabajadas) {
		parent::__construct($nombre);
		$this->valorHora = $valorHoras;
		$this->horasTrabajadas = $horasTrabajadas;
	}

	public function calcularsueldo() {

		$this->sueldo = $this->horasTrabajadas * $this->valorHora;
	}
}

class Gerente extends Trabajador{

	protected $utilidades;


	public function __construct($nombre, $utilidades) {
		parent::__construct($nombre);
		$this->utilidades = $utilidades;
	}

	public function calcularsueldo() {
		$this->sueldo = $this->utilidades*0.1;
	}
}

print "Sueldo del empleado <br>";
$empleado1 = new Empleado("Mariano", 3.50, 150);
$empleado1->calcularSueldo();
$empleado1->imprimir();

print "<br>Sueldo del gerente<br>";
$gerente = new Gerente("Pep", 1000000);
$gerente->calcularSueldo();
$gerente->imprimir();