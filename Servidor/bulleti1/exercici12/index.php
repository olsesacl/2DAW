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
        $i = 100;
        while ($i >= 0) {
            
            if($i != 100){
                $message .= ", ";
            }
            
            $message .= $i;
            $i = $i-2;
        }
        
        print $message;
        ?>
    </body>
</html>
