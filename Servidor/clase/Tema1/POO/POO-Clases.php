<?php

class persona{
    
    private $nom;
    
    function inicializar($nom){
        $this->nom = $nom;
    }
    
    function imprimir(){
        
        print $this->nom;
        print "<br />";
    }
}

//utilizar la clase

$per1 = new persona();

$per1->inicializar("Juan");
$per1->imprimir();

$per2 = new persona();

$per2->inicializar("Pepe");
$per2->imprimir();