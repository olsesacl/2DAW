<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php
        $nombre = "Sergio";
        $apellidos = "Sanchis Climent";
        
        print "El nombre del alumno es $nombre $apellidos"; 
        
        ?>
        <form action="index.php" method="POST">
            X:<input type="text" name="x" value="" />
            Y:<input type="text" name="y" value="" />
        </form>
        <br />
        
        <?php
        
        if(!empty($_POST['x'])){
            $x = $_POST['x'];
        }
        
        if(!empty($_POST['y'])){
            $y = $_POST['y'];
        }
        
        if((empty($x) || empty($y))){
            
            print "Has de rellenar los dos datos<br />";            
        } else {
            
            print "Resultado: ";
            
            if($x > 0 && $y < $x){
                
                print $nombre;
                
            }
            
        }
        
    
        ?>
    </body>
</html>
