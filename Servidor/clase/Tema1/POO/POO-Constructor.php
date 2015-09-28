<?php

class CabeceraPagina{
    
    private $titulo;
    private $ubicacion;
    
    
    public function __construct($tit, $ubi) {
        
        $this->titulo = $tit;
        $this->ubicacion = $ubi;
        
    }
    
    public function dibujar(){
        
        print "<div style='font-size:40px; text-align:$this->ubicacion'>";
        print "$this->titulo";
        print "</div>";
        
    }
    
}

//aplicacion de la clase

$cabecera = new CabeceraPagina("El blog del programador", "center");
$cabecera->dibujar();

$cabecera2 = new CabeceraPagina("Titulo alineado right", "right");
$cabecera2->dibujar();

$cabecera3 = new CabeceraPagina("Titulo alineado left", "left");
$cabecera3->dibujar();