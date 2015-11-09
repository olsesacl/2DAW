<!DOCTYPE html>
<!--
Mostrar los divisores de los numeros
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
        
        $divisores=array();
        
        if(isset($num) && $num !=''){
            $i = 1;
            while( $i <= $num){
                
                if($num%$i == 0){
                    $divisores[]=$i;
                }
                $i++;                
            }
            
            $message = "Los divisores de $num son:";
            
            $check = 1;
            
            foreach ($divisores as $x){
                
                if($check){
                    $check = 0;
                    $message .=" $x";
                } else {
                    $message .=", $x";
                }
            }
            
            print $message;
        }
        
        ?>
    </body>
</html>
