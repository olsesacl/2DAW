<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Operacion03 {
    
    protected $valor1;
    protected $valor2;
    protected $resultado;

    public function __construct($v1,$v2) {
        $this->valor1 = $v1;
        $this->valor2 = $v2;
    }
    
    public final function imprimirResultado(){
        return  $this->resultado . "<br />";
    }
}

final class Suma03 extends Operacion03{
    private $titulo;
    public function __construct($v1,$v2,$tit) {
        parent::__construct($v1,$v2);
        $this->titulo = $tit;
    }
    
    
    public function operar() {
        echo $this->titulo . "<br />";
        echo $this->valor1 . " + " . $this->valor2 . " es: ";
        echo $this->resultado = $this->valor1 + $this->valor2;
     
    }

}

$suma = new Suma03(10,10,"SUMA DE VALORES.");
$suma->operar();
$suma->imprimirResultado();