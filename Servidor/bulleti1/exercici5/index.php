<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $cadena1 = "Hola a todo el mundo";
        $cadena2 = "mi nombre es Sergio Sanchis Climent";
        
        $cadena3 = $cadena1." ".$cadena2;
        print $cadena3."<br />";
        
        $cadena1 .=" ".$cadena2;
        
        print $cadena1;
        ?>
    </body>
</html>
