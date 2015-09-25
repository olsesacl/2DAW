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
        $tamaño = 6;
        for($i = 0 ; $i < $tamaño; $i++){
            
            for($j = $i; $j >=0; $j--){
                
                print "*";
            }
            print "<br />";
        }
        ?>
    </body>
</html>
