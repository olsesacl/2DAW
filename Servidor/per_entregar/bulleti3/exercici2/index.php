<?php
/*
 * Confeccionar una clase Empleado, definir como atributos su nombre y
 * sueldo.
 * Definir un método inicializar que lleguen como dato el nombre y sueldo.
 * Plantear un segundo método que imprima el nombre y un mensaje si
 * debe o no pagar impuestos (si el sueldo supera a 3000 paga impuestos)
 */
include("Empleado.php");

?>



<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php
    $empleado1 = new Empleado();
    $empleado1->inicializar("Pepe", 1500);
    $empleado1->print_values();

    $empleado2 = new Empleado();
    $empleado2->inicializar("Pepe", 3500);
    $empleado2->print_values();
    ?>


    </body>
</html>