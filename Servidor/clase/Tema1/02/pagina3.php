<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

?>

<html>
    <head>
        <title>Pagina 3</title>
    </head>
    <body>
        <?php echo "El usuario recuperado es " . $_SESSION['user']
                . "<br />La contraseña es: " . $_SESSION['password']; ?>
        
        <a href="cerrarSesion.php" >Cerrar sesion</a>
    </body>
</html>