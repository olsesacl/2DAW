<?php

include './connectDB.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$table = "usuarios";


$user = $_POST['user'];
$password = $_POST['password'];
$email = $_POST['email'];

$db = connect();

$sql = "INSERT INTO usuarios (nombre, clave, email) VALUES ('$user', '$password', '$email');";
if(mysqli_query($db, $sql)){
    echo "Usuario guardado correctamente.<br />";
} else {
    echo "ERROR AL GUARDAR EL USUARIO<br />";
}

disconnect($db);