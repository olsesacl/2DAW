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
        
        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $poblacion = $_POST['poblacion'];
        $club = $_POST['club'];
        
        $sql = "UPDATE participantes SET"
                . " IdParticipante='$id', Apellidos='$apellidos',"
                . " Nombre='$nombre', Poblacion='$poblacion',"
                . " CLUB='$club'"
                . " WHERE IdParticipante=$id";
        mysqli_query($con, $sql);
        mysqli_close($con);
    }

    
    