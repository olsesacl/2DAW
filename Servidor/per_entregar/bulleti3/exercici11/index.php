<?php

include("./Persona.php");

?>

<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php
    $persona = new Persona();
    $persona->update("Pepe", 25);
    $persona->show();

    $empleado = new Empleado();
    $empleado->update("Manolo", 36, 1300);
    $empleado->show();
    ?>


    </body>
</html>