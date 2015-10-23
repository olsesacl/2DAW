<?php

/**Confeccionar una clase Tabla que permita indicarle en el constructor la
 * cantidad de filas y columnas. Definir otro método que podamos cargar un
 * dato en una determinada fila y columna además de definir su color de
 * fuente y fondo. Finalmente debe mostrar los datos en una tabla HTML
 *
 */
class Tabla
{
    private $tabla = array();


    public function __construct($filas = "0", $columnas = "0"){

        for($i = 0; $i < $filas; $i++){

        }
    }

    public function anadir($dato, $fila, $columna, $color, $fondo){

        $info = new Informacion($dato,$color,$fondo);

        $this->tabla[$fila][$columna] = $info;
    }

    function mostrar(){
        print "<table>";

        for($i = 0; $i < count($this->tabla); $i++){

            print "<tr>";
            for($j = 0; $j < count($this->tabla[$i]); $j++){

                $this->tabla[$i][$j]->mostrar();
               /* $dato = $this->tabla[$i][$j];
                $dato->mostrar();*/
            }
            print "</tr";
        }

        print "</table";
    }




}

class Informacion
{
    private $dato;
    private $color;
    private $fondo;

    public function __construct($dato = "", $color="", $fondo=""){
        $this->dato = $dato;
        $this->color = $color;
        $this->fondo = $fondo;
    }

    function mostrar(){

        print "<tr style='color:".$this->color.";background-color:".$this->fondo."'>".$this->dato."</tr>";
    }


}