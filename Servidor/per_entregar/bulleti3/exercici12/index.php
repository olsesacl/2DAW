<?php

include("./Persona.php");

?>

<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php
    $empleado = new Empleado();
    $empleado->update("Manolo", 36, 1300);

    print "Antes: ";
    $empleado->show();

    $empleado->setEdad("18");
    print "Despues: ";
    $empleado->show();
    ?>


    </body>
</html>