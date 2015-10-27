<?php

include("./Persona.php");

?>

<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php
    /*
     * Fatal error: Cannot instantiate abstract class Persona in ... on line 13
    $persona = new Persona("Pep", 20);
    $persona->update("Pepe", 25);
    $persona->show();*/
    print "Al intentar instanciar la clase persona ix el següent error:</br>Fatal error: Cannot instantiate abstract class Persona in ... on line 13</br>";

    $empleado = new Empleado("Manolet", 26, 800);
    $empleado->update("Manolo", 36, 1300);
    $empleado->show();
    ?>


    </body>
</html>