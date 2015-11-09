<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$dsn = "mysql:host=127.0.0.1;dbname=Carreras";
$username = "root";
$passwd = "servidor";
try {
    $con = new PDO($dsn, $username, $passwd);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
    $poblacion= "GANDIA";
    $sql = "SELECT * FROM participantes WHERE Poblacion =?";
    $stmt=$con->prepare($sql);
    $stmt->execute(array($poblacion));
    
    while($datos=$stmt->fetch()){
        echo "Apellidos: " . $datos['Apellidos'] . " Nombre: "
                . $datos['Nombre'] . "<br />";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}