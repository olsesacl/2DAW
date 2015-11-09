<!DOCTYPE html>
<!--
Elaborar una página PHP que contenga una función cuadrado que recibe 2 parámetros,
un carácter (que puede ser cualquiera) y un número , la función debe mostrar por
pantalla un cuadrado con el carácter recibido ( tantas filas y columnas como indique el número).
a) Ejemplo: cuadrado(“#”,3)
###
###
###
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        $caracter = $_POST['caracter'];
        $num = $_POST['num'];
        ?>
        
        <form action="index.php" method="POST">
            Caracter: <input type="text" name="caracter" value="<?php print $caracter?>" />
            Repeticions: <input type="text" name="num" value="<?php print $num?>" />
            <input type="submit" value="Enviar" />
        </form>
        
        <?php
        
        if(isset($num) && $num!='' && isset($caracter) && $caracter !=''){
            
           cuadrado($caracter, $num);
            
        }
        
        function cuadrado($c, $n){
            $m ='';
        
            for($i = 0; $i < $n; $i++){
                
                for($j = 0; $j < $n; $j++){
                    
                    $m .= $c;
                }
                $m .= "<br />";
            }
            
            print $m;
            
        }
        
        ?>
    </body>
</html>
