<!DOCTYPE html>
<!--
Elaborar una página PHP que contenga una función pirámide que recibe 2 parámetros,
un carácter (que puede ser cualquiera) y un número , la función debe mostrar por
pantalla una pirámide invertida con el carácter recibido ( tantas filas y columnas
como indique el número y de ahí descendiendo hasta 1).
a) Ejemplo: piramide(“@”,4)
@@@@
@@@
@@
@
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
            
           piramide($caracter, $num);
            
        }
        
        function piramide($c, $n){
            $m ='';
        
            for($i = $n; $i > 0; $i--){
                
                for($j = $i; $j > 0; $j--){
                    
                    $m .= $c;
                }
                $m .= "<br />";
            }
            
            print $m;
            
        }
        
        ?>
    </body>
</html>
