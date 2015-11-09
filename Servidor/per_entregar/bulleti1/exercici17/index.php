<!DOCTYPE html>
<!--
Realizar un programa en PHP que muestre por pantalla los números del 1 al 100 separados por coma “,” . 
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        $num = array();
        //rellenamos el array con los numeros del 1 al 100
        for($i = 1 ; $i <=100; $i++){
            $num[] = $i;
        }
        
        $message = "Numeros del 1 al 100: ";
        
        $check = 1;
        //añadimos al mensaje de salida los numeros anteriores poniendo las comas
        foreach ($num as $x){

            if($check){
                $check = 0;
                $message .=" $x";
            } else {
                $message .=", $x";
            }
        }
        
        print $message;
        ?>
    </body>
</html>
