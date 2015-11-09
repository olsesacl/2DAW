<?php

/**
 * 
 */
class Persona {

    private $nombre;

    public function inicializar($nom) {
        $this->nombre = $nom;
    }

    public function imprimir() {
        echo $this->nombre;
        echo "<br />";
    }

}

//Anem a gastar la clase

$per1 = new Persona();
$per1->inicializar("Lucia");
$per1->imprimir();
?>