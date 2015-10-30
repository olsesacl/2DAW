<?php

/**
  *  Confeccionar una clase Cuadrado. Definir como atributo su lado.
  *  Implementar un método que lo cargue el lado, otro que retorne su
  *  perímetro y otro que retorne su superficie.
  *  Crear un objeto de la clase Cuadrado e inicializar el lado. Definir una
  *  segunda variable y asignarle la referencia del objeto de la clase
  *  Cuadrado. Imprimir la superficie y perímetro mediante esta segunda
  *  variable.
 */
class Cuadrado
{

    private $lado;

    public function  insertar($lado){
        $this->lado = $lado;
    }

    public function perimetro(){
        return $this->lado * 4;
    }
     public function superficie(){
         return pow($this->lado, 2);
     }


}