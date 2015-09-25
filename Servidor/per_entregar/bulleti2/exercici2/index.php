<!DOCTYPE html>
<!--
Elaborar una página PHP que contenga una función media que recibe 4 números
como parámetros y devuelve el valor medio de los 4 parámetros recibidos.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $num3 = $_POST['num3'];
        $num4 = $_POST['num4'];
        ?>
        
        <form action="index.php" method="POST">
            Num1: <input type="text" name="num1" value="<?php print $num1;?>" /><br>
            Num2: <input type="text" name="num2" value="<?php print $num2;?>" /><br>
            Num3: <input type="text" name="num3" value="<?php print $num3;?>" /><br>
            Num4: <input type="text" name="num4" value="<?php print $num4;?>" /><br>
            <input type="submit" value="Enviar" />
            
        </form>
        <?php
        
        if(isset($num1) && $num1 !='' && isset($num2) 
                && $num2 !='' && isset($num3) && $num3 !='' && isset($num4) && $num4 !=''){
       
            $media = media($num1, $num2, $num3, $num4);

            print "La media de $num1, $num2, $num3, $num4 es $media";
        }
            
        
        
        function media($num1, $num2, $num3, $num4){
            return (($num1 + $num2 + $num3 + $num4)/4);
        } 
        ?>
    </body>
</html>
