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
        <?php
        
        $message = '';
        $i = 1;
        while($i <=100){
            
            if($i != 1){
                $message .= ", ";
            }
            
            $message .= $i;
            $i++;
        }
        
        print $message;
        
        ?>
    </body>
</html>
