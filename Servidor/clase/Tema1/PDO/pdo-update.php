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
    
    
    $poblacion= "ALZIRA";
    $poblacion2= "ALCIRA";
    $sql = "UPDATE participantes SET Poblacion=? WHERE Poblacion=?";
    $stmt=$con->prepare($sql);
    $filas = $stmt->execute(array($poblacion,$poblacion2));
    
    if ($filas > 0) {
        echo "Actualizacion correcta";
    } else {
        echo "Error al actualizar";
    }
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}