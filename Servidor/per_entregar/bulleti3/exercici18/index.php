<?php

include("./Cuadrado.php");

?>

<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php

    $cuadrado1 = new Cuadrado();
    $cuadrado1->insertar(6);

    $cuadrado2 = $cuadrado1;

    print "Perimetro: ". $cuadrado2->perimetro()."<br>";
    print "Superficie: ". $cuadrado2->superficie()."<br>";

    ?>


    </body>
</html>