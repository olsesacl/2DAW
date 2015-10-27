<?php

include("./Persona.php");

?>

<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php
    $persona = new Persona("Pep", 20);
    $persona->update("Pepe", 25);
    $persona->show();

    $empleado = new Empleado("Manolet", 26, 800);
    $empleado->update("Manolo", 36, 1300);
    $empleado->show();
    ?>


    </body>
</html>