<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Participante {

    private $Nombre;
    private $Apellidos;
    private $Poblacion;
    private $CLUB;

    public function ficha() {
        return "Nombre: " . $this->Nombre . " Apellidos: " . $this->Apellidos
                . " Poblacion: " . $this->Poblacion . " Club: " . $this->CLUB
                ."<br />";
    }

}

$dsn = "mysql:host=127.0.0.1;dbname=Carreras";
$username = "root";
$passwd = "servidor";
try {
    $con = new PDO($dsn, $username, $passwd);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "SELECT Nombre, Apellidos, Poblacion, CLUB FROM participantes"
            . " ORDER BY Apellidos";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Participante');
    
    while($participante = $stmt->fetch()){
        echo $participante->ficha();
    }
} catch (Exception $ex) {
    
}