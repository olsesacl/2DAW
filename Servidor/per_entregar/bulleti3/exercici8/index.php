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
    $tabla->anadir("X" , 3,2,"red", "yellow");
    $tabla->anadir("X" , 4,3,"blue", "green");
    $tabla->anadir("X" , 2,1,"", "");
    $tabla->mostrar();

    ?>
    </body>
</html>
