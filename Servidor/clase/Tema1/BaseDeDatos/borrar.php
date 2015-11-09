<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$id = $_GET['id'];

$con = mysqli_connect("127.0.0.1", "root", "servidor", "Carreras");
    if(mysqli_connect_errno($con)){
        echo "Fallo al conectar MYSQL" . mysqli_connect_error();
    } else {
        $sql = "DELETE FROM participantes WHERE IdParticipantes = $id";
    }

    
    $sql = "DELETE FROM participantes WHERE IdParticipante=$id";
    mysqli_query($con, $sql);
    mysqli_close($con);