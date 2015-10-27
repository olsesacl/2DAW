<?php

/**
 * Confeccionar la clase Tabla vista en conceptos anteriores. Plantear una
 * clase Celda que colabore con la clase Tabla. La clase Tabla debe definir
 * una matriz de objetos de la clase Celda.
 * En la clase Tabla definir un método insertar que llegue un objeto de la
 * clase Celda y además dos enteros que indiquen que posición debe tomar
 * dicha celda en la tabla.
 * La clase Celda debe definir los atributos: $texto, $colorFuente y
 * $colorFondo.
 *
 */
class Tabla
{
    private $tabla = array();


    public function __construct($filas = "0", $columnas = "0"){

        for($i = 0; $i < $filas; $i++){

            for($j = 0; $j < $columnas; $j++){

                $this->tabla[$i][$j] = new Celda();
            }
        }
    }

    public function insertar($celda, $fila, $columna){

        $this->tabla[$fila][$columna] = $celda;
    }

    function mostrar(){

        print "<table border='2' width='100%' style='text-align: center'>";

        for($i = 0; $i < count($this->tabla); $i++){

            print "<tr>";
            for($j = 0; $j < count($this->tabla[$i]); $j++){

               // $this->tabla[$i][$j]->mostrar();
                $dato = $this->tabla[$i][$j];
                $dato->mostrar();
            }
            print "</tr>";
        }

        print "</table";
    }




}

class Celda
{
    private $texto;
    private $colorFuente;
    private $colorFondo;

    public function __construct($texto = "&nbsp;", $colorFuente="", $colorFondo=""){
        $this->texto = $texto;
        $this->colorFuente = $colorFuente;
        $this->colorFondo = $colorFondo;
    }
    public function insertar($texto = "&nbsp;", $colorFuente="", $colorFondo=""){
        $this->texto = $texto;
        $this->colorFuente = $colorFuente;
        $this->colorFondo = $colorFondo;
    }

    function mostrar(){

        print "<td style='";
        if(!empty($this->colorFuente)) print "color:".$this->colorFuente.";";
        if(!empty($this->colorFondo)) print "background-color:".$this->colorFondo;
        print "'>".$this->texto."</td>";
    }


}