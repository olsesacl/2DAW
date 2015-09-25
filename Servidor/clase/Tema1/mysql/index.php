<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        $host = "localhost";
        $user = "lucia";
        $password = "lliurex";
        $database = "empresa";
        
        //funcio par a conectarse
        $con = mysqli_connect($host, $user, $password, $database);
        
        if (mysqli_connect_errno($con)){
            print "Fallo al connectar a mysqli.<br />".  mysqli_connect_error();
        } else {
            echo "Conexion correcta";
        }
        
        ?>
    </body>
</html>
