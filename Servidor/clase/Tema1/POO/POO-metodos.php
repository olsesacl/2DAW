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
        print "<table border='1'>";        
    }
    
    private function finTabla(){
        print "</table>";        
    }
    
    private function inicioFila(){
        print "<tr>";
    }
    
    private function finFila(){
        print "</tr>";
    }
    
    public function cargarDatos($fila, $columna, $valor){
        
        $this->mat[$fila-1][$columna-1] = $valor;
        
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

$tabla1 = new Tabla(2, 3);

$tabla1->cargarDatos(1, 1, 1);
$tabla1->cargarDatos(1, 2, 2);
$tabla1->cargarDatos(1, 3, 3);
$tabla1->cargarDatos(2, 1, 4);
$tabla1->cargarDatos(2, 2, 5);
$tabla1->cargarDatos(2, 3, 6);

$tabla1->dibujar();