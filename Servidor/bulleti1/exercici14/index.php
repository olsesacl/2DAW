<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
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
            
            for($i = 1; $i <= $num; $i++){
                
                if($num%$i == 0){
                    $divisores[]=$i;
                }
                
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
