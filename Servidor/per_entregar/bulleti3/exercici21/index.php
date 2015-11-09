<?php

include("./Trabajador.php");

?>

<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php

   $trabajador = new Trabajador("Pepe", 1200);
    $trabajador->show();


    ?>


    </body>
</html>