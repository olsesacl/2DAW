<?php
/**Confeccionar una clase Tabla que permita indicarle en el constructor la
 * cantidad de filas y columnas. Definir otro método que podamos cargar un
 * dato en una determinada fila y columna además de definir su color de
 * fuente y fondo. Finalmente debe mostrar los datos en una tabla HTML
 *
 */

include("Tabla.php");

?>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php

    $tabla = new Tabla(5,6);

    ?>
    </body>
</html>
