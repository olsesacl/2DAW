<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
$user = $_POST['user'];
$pass = $_POST['password'];

$_SESSION['user'] = $user;
$_SESSION['password'] = $pass;

?>

<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        
        Se almacenaron dos variables de sesion.
        <br />
        <br />
        <a href="pagina3.php" >Ir a la tercera pagina donde se recuperaran las variables de sesion.</a>
    </body>
</hmtl>