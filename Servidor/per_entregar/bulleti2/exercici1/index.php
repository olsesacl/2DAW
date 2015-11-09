<!DOCTYPE html>
<!--
Elaborar una página PHP que contenga una función primo (número primo es aquel que solo es divisible por 1 y por él mismo ) que recibe un número como parámetro y devuelve los siguientes resultados:
a) Si el número es primo muestra por pantalla “El número es primo”.
b) Si el número NO es primo muestra por pantalla “El número NO es primo”.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="index.php" method="POST">
            Num: <input type="text" name="num" value="" />
            <br />
            <input type="submit" value="Enviar" />
            <br />
            <br />
        </form>

        <?php
        $num = $_POST['num'];


        if(isset($num) && $num !=''){

            $divisores = divisores($num);

            if(count($divisores) > 2){

                $message = "El numero $num NO es primo, sus divisores son: ";

                $check = 1;

                foreach ($divisores as $x){

                    if($check){
                        $check = 0;
                        $message .=" $x";
                    } else {
                        $message .=", $x";
                    }
                }
            } else {

                $message = "El numero $num es primo";

            }

            print $message;


        }

        function divisores($num){

            $divisores = array();

            for($i = 1; $i <= $num; $i++){

                if($num%$i == 0){
                    $divisores[] = $i;
                }

            }

            return $divisores;
        }
        ?>
    </body>
</html>
