<?php

class Tabla{
    
    private $cantFilas;
    private $cantColumnas;
    private $mat = array();
    
    
    public function __construct($fil, $col) {
        
        $this->cantFilas = $fil;
        $this->cantColumnas = $col;
        
    }
    
    private function inicioTabla(){        
        print "<tabla border='1'>";        
    }
    
    private function finTabla(){
        print "</tabla>";        
    }
    
    private function inicioFila(){
        print "<tr>";
    }
    
    private function finFila(){
        print "</tr>";
    }
    
    public function cargarDatos($fila, $columna, $valor){
        
        $this->mat[$fila] [$columna] = $valor;
        
    }
    
    private function mostrar($fil, $col){
        
        print "<td>".$this->mat[$fil][$col]."</td>";
        
    }
    
   
    public function dibujar(){
        
        $this->inicioTabla();
        
        for($f = 0; $f < $this->cantFilas; $f++){
            
            $this->inicioFila();
            
            for($c = 0 ; $c < $this->cantColumnas; $c++){
                
                $this->mostrar($f, $c);
                
            }
            
            $this->finFila();
        }
        
        $this->finTabla();
        
        
    }
    
}

//utilizando la clase

$tabla = new Tabla(2, 3);

$tabla->cargarDatos(1, 1, "abc");
$tabla->cargarDatos(1, 2, "2");
$tabla->cargarDatos(1, 3, "3");
$tabla->cargarDatos(1, 1, "4");


$tabla->dibujar();