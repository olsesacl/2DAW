<?php

include("./Calculadora.php");

?>

<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php

    $x = 9;
    $y = 3;
    print $x." + ".$y."= ".Calculadora::sumar($x,$y)."<br>";
    print $x." - ".$y."= ".Calculadora::restar($x,$y)."<br>";
    print $x." * ".$y."= ".Calculadora::multiplicar($x,$y)."<br>";
    print $x." / ".$y."= ".Calculadora::dividir($x,$y)."<br>";




    ?>


    </body>
</html>