<?php

class CabeceraPagina {

	private $titulo;
	private $ubicacion;
	private $colorFuente;
	private $colorFondo;

	public function __construct($titulo, $ubicacion, $colorFuente, $colorFondo) {
		$this->titulo = $titulo;
		$this->ubicacion = $ubicacion;
		$this->colorFuente = $colorFuente;
		$this->colorFondo = $colorFondo;
	}

	public function dibujar(){
		print '<div style="font-size: 40px; text-align: '.$this->ubicacion.';color:'.$this->colorFuente;
		print '; background-color: '.$this->colorFondo.'">'.$this->titulo."</div>";
	}

}


$cabecera = new CabeceraPagina("El blog del programador", "center", "red", "yellow");
$cabecera->dibujar();