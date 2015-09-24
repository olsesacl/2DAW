<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        
        
        print "<form action='index.php' method='POST'>
            Nombre: <input type='text' name='nombre' value='$nombre' />
                <br /><br />
            Apellidos: <input type='text' name='apellidos' value='$apellidos' />
                <br /><br />
            Num_1: <input type='text' name='num1' value='$num1' />
                <br /><br />
            Num_2: <input type='text' name='num2' value='$num2' />
            <br />
            <input type='submit' value'Enviar' />
        </form>
        <br /><br />";
        
        if(isset($num1) && $num1 != "" && isset($num2) && $num2 != "" && isset($nombre) && $nombre != "" && isset($apellidos) && $apellidos != "")          
        { 
            $message = 'Resultado: ';
            
            if($num1 > 0 && $num2 < $num1){
                
                $message .= $nombre;
                
            } else if($num1 > 0 && $num2 >= $num1){
                
                $message .= $apellidos;
                
            } else if($num1 < 0){
                
                $message .= $nombre." ".$apellidos;
                
            } else {
                $message = "No entra en ningun apartado";
            }
            
            print "$message";
            
        } else {
            print "Has de rellenar todos los datos<br />";
        }
        
        
    
        ?>
    </body>
</html>
