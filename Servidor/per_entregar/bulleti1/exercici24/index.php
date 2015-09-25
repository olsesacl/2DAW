<!DOCTYPE html>
<!--
con switch
Hacer una página en PHP que para una nota almacenada en una variable,muestre por pantalla lo siguiente:
a) Si la nota es menor que 5 -> “suspenso”
b) Si la nota está entre 5 y 6 -> “aprobado”
c) Si la nota está entre 6 y 7 -> “bien”
d) Si la nota está entre 7 y 8 -> “notable”
e) Si la nota es mayor que 8 -> “sobresaliente”
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="index.php" method="POST">
            Nota: <input type="text" name="nota" value="" />
            <br />
            <input type="submit" value="Enviar" />
            <br />
            <br />
        </form>

        <?php
        $nota = $_POST['nota'];
        if(isset($nota) && $nota !=''){
            $message = "Tu nota es $nota: ";
            
            //floor es una funcion para redondear hacia abajo
            $redondeo =  floor($nota);
            if($redondeo < 5){
                $redondeo = 0;
            } else if ($redondeo >= 8){
                $redondeo = 10;
            }
            
            
            switch ($redondeo){
            case 0:
                $message .= "suspenso";
                break;
            case 5:
                $message .= "aprobado";
                break;
            case 6:
                $message .= "bien";
                break;
            case 7:
                $message .= "notable";
                break;
            case 10:
                $message .= "sobresaliente";
                break;
            }
            
            print $message;
        }

        
        ?>
    </body>
</html>
