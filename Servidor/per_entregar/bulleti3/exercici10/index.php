<?php

include("./Empleado.php");

?>

<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php
    $empleado1 = new Empleado("Pepe");
    $empleado1->print_values();

    $empleado2 = new Empleado("Manolo", 3500);
    $empleado2->print_values();
    ?>


    </body>
</html>