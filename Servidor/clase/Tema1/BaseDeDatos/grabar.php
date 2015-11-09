<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$con = mysqli_connect("127.0.0.1", "root", "servidor", "Carreras");
    if(mysqli_connect_errno($con)){
        echo "Fallo al conectar MYSQL" . mysqli_connect_error();
    } else {
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $poblacion = $_POST['poblacion'];
        $club = $_POST['club'];
        
        $sql = "INSERT INTO participantes (Apellidos, Nombre, Poblacion, CLUB)"
                . " VALUES ('$apellidos', '$nombre', '$poblacion', '$club')";
        
        mysqli_query($con, $sql) or die('ERROR:' . mysqli_error($con));
    }

    mysqli_close($con);
    
?>