<?php

/**
 * 
 */

abstract class Operacion01 {

    protected $valor1;
    protected $valor2;
    protected $resultado;

    function __construct($v1, $v2) {
        $this->valor1 = $v1;
        $this->valor2 = $v2;
    }

    public function imprimirResultado() {
        return $this->resultado . "<br />";
    }

}

class Suma01 extends Operacion01 {

    public function operar() {
        $this->resultado = $this->valor1 + $this->valor2;
    }

}

class Resta01 extends Operacion01 {

    public function operar() {
        $this->resultado = $this->valor1 - $this->valor2;
    }

}

$suma = new Suma01(10, 10);
$suma->operar();
echo "El resultado de la suma es: " . $suma->imprimirResultado();

$resta = new Resta01(20, 10);
$resta->operar();
echo "El resultado de la resta es: " . $resta->imprimirResultado();

?> 

