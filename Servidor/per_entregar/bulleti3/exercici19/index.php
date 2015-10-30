<?php

include("./Persona.php");

?>

<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php

    $persona1 = new Persona();
    $persona1->update("Pepe", 25);


    $persona2 = clone($persona1);
    $persona2->setEdad($persona2->getEdad()+1);

    $persona1->show();
    $persona2->show();



    ?>


    </body>
</html>