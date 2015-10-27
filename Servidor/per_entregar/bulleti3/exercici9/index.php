<?php

include("Tabla.php");

?>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php

    $tabla = new Tabla(5,6);

    $celda = new Celda("X","red", "yellow");
    $tabla->insertar(clone($celda), 3,2);

    $celda->insertar("Y","blue", "green");
    $tabla->insertar(clone($celda), 4,3);

    $celda->insertar("W","", "");
    $tabla->insertar(clone($celda), 2,1);
    $tabla->mostrar();

    ?>
    </body>
</html>
