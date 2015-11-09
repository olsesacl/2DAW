<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

abstract class Operacion02{
    protected $valor1;
    protected $valor2;
    protected $resultado;
    
    public function __construct($v1,$v2) {
        $this->valor1 = $v1;
        $this->valor2 = $v2;
    }
    
    public function imprimirResultado(){
        return  $this->resultado . "<br />";
    }
    
    public abstract function operar();
            
}

class Suma02 extends Operacion02{
    public function operar() {
     $this->resultado = $this->valor1 + $this->valor2;
     
    }

}

class Resta02 extends Operacion02{
    public function operar() {
     $this->resultado = $this->valor1 - $this->valor2;
     
    }

}

$suma = new Suma02(10, 10);
$suma->operar();
echo "El resultado de la suma es: " . $suma->imprimirResultado();


$resta = new Resta02(35, 10);
$resta->operar();
echo "El resultado de la suma es: " . $resta->imprimirResultado();