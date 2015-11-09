<?php

include("./Trabajador.php");

?>

<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php

    $trabajadores = array(new Empleado("Empleado1", "1200"), new Empleado("Empleado2", "800"),
                    new Gerente("Gerente1", "2000"), new Gerente("Gerente2", "800"),
                    new Empleado("Empleado3", "1300"));

    $max = -1;
    for($i = 0 ; $i < count($trabajadores); $i++){

        if($trabajadores[$i] instanceof Gerente){

            if($max == -1){
                $max = $i;
            } else if($trabajadores[$i]->getsueldo() > $trabajadores[$max]->getsueldo()){
                $max = $i;
            }
        }
    }

    if($max == -1){
        print "No se ha encontrado ningun gerente";
    } else {
        print $trabajadores[$max]->getnombre()." tiene el sueldo mayor: " . $trabajadores[$max]->getsueldo();
    }

    ?>


    </body>
</html>