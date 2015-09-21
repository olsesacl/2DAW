<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $combinacio[] = null;
        
        //buscamos los 5 numeros sin repeticiones
        while(count($combinacio) <= 5){
            $temp = mt_rand(1, 50);
            
            if(!in_array($temp, $combinacio)){
                $combinacio[count($combinacio)] = $temp;
            }
        }
        
        $estrellas[] = null;
        
        //buscamos los 5 numeros sin repeticiones
        while(count($estrellas) <= 2){
            $temp = mt_rand(1, 9);
            
            if(!in_array($temp, $estrellas)){
                $estrellas[count($estrellas)] = $temp;
            }
        }
        
        print "La combinacion ganadora: ";
        
        foreach ($combinacio as $num){
            print $num." ";
        }
        print "y las estrellas: ";
        foreach ($estrellas as $num){
            print $num." ";
        }
        
        
        ?>
    </body>
</html>
