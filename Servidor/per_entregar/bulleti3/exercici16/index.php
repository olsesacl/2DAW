<?php

include("./Trabajador.php");

?>

<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php

    $empleado = new Empleado("Pepe",40);
    $empleado->calcularSueldo();
    $empleado->show();

    $empleado2 = new Empleado("Manolo",25);
    $empleado2->calcularSueldo();
    $empleado2->show();

   print  "Horas de todos los trabajadores ".Trabajador::$todos_sueldos."</br>";

    $gerente = new Gerente("Jefazo");
    $gerente->calcularSueldo();
    $gerente->show();

    ?>


    </body>
</html>