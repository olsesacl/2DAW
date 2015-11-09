<?php
function connect(){
    $host = "127.0.0.1";
    $user = "root";
    $password = "servidor";
    $database = "empresa";

    $db = mysqli_connect($host, $user, $password, $database);

    if (mysqli_connect_errno()){
        echo "Fallo al conectar a MySQL<br />" . mysqli_connect_error() . "<br />";
    } else {
  //      echo "Conexion con exito!<br />";
    }
    return $db;
}
function connectFrom($baseDatos){
    $host = "localhost";
    $user = "root";
    $password = "servidor";

    $db = mysqli_connect($host, $user, $password, $baseDatos);

    if (mysqli_connect_errno()){
        echo "Fallo al conectar a MySQL<br />" . mysqli_connect_error() . "<br />";
    } else {
  //      echo "Conexion con exito!<br />";
    }
    return $db;
}
function disconnect($db){
    mysqli_close($db);
}
    

    