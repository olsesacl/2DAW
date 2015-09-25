<!DOCTYPE html>
<!--
Hacer una página en PHP que muestre los 20 primeros términos de la sucesión de Fibonacci.La sucesión de
Fibonacci se caracteriza por tener el primer elemento:1, el segundo elemento: 1 y el resto de elementos : se
forman sumando los 2 términos anteriores -> 1 ,1 , 2, 3, 5 ,…..
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        //$num es el numero de elementos a mostrar
        $num = 20;
        
        $fibonacci = [1,1];
         
        //$i es 2 porque el proximo elemento estara en la posicion 2 del array
        for($i = 2; $i < $num; $i++){
            
            $fibonacci[$i] = $fibonacci[$i-1] + $fibonacci[$i-2];
        }
        
        //$check es para poner o no la coma, en el primer elemento no se pondria
        $check = 1;
        
        $message = "Los primeros $num numeros de la sucesión de fibonacci son: ";
        foreach ($fibonacci as $x){

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
