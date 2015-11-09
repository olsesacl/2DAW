<!DOCTYPE html>
<!--
Elaborar una página PHP que contenga una función cuentavocales que recibe
una cadena de texto y muestra por pantalla el número de vocales totales que
tiene la cadena(recordad que una cadena de texto se comporta como una array
de caracteres):
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $text = $_POST['text'];
        ?>
        
        <form action="index.php" method="POST">
            <textarea name="text" rows="4" cols="20"><?php print $text?></textarea>
            <input type="submit" value="Enviar"/>
        </form>
        
        <?php
        
        if(isset($text) && $text !=''){
            
            $numvocals = cuentavocales($text);
            
            print "El texto escrito tiene $numvocals vocales";
            
        }
        
        function cuentavocales($text) {
                
                $vocals = ['a','e', 'i', 'o','u'];
                $numvocales = 0;
            
                for($i = 0; $i < strlen($text); $i++){
                    
                    if(in_array($text[$i], $vocals)){
                        $numvocales++;
                    }
                }
                
                return $numvocales;
            }
        
        ?>
    </body>
</html>
