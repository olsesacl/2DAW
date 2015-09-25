<!DOCTYPE html>
<!--
Se pide realizar una función para calcular el ritmo (velocidad en carrera a pie minutos/km).
La función contendrá 2 parámetros la distancia total de la prueba y el tiempo empleado en recorrer la distancia.
a) Ejemplo : ritmo(21090,”01:55:39”) //Distancia en metros (21.090 m) y 
    tiempo en formato horas:minutos:segundos. Devolvería la función 05:29 ,
    es decir a 5 minutos 29 segundos el km.
b) Para la comprobación de la función podéis utilizar el siguiente enlace:
http://www.carreraspopulares.com/calculadora/V5-calculadora.asp
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $tiempo = $_POST['tiempo'];
        $distancia = $_POST['distancia'];
        
        if(isset($tiempo) && $tiempo != '' && isset($distancia) && $distancia !=''){
            
            $medKm = mediaKm($tiempo, $distancia);
            
        }
        
        function mediakm($t, $d){
            
            //recogemos los valores por separado
            $h = substr($t,0,2);
            $m = substr($t,3,2);
            $s = substr($t,6,2);
            
            //pasamos todos los tiempos a segundos para hacer el calculo con ellos
            $m = $m + ($h * 60);
            $s = $s + ($m * 60);
            
            //ahora dividimos el tiepmo entre la distancia(metros) para saber al metro cuanto tarda
            $result = $s/$d;
            $result = $result * 1000; //porque queremos saber cuanto tarda por Km
            
            
            //pasamos el resultado en formato hh:mm:ss
           // $h = $result/;
        }
        ?>
        <form action="index.php" method="POST">
            <div>Distancia: <input type="text" name="distancia" value="<?php print $distancia?>"/> metros</div> 
            <div>Tiempo: <input type="text" name="tiempo" value="<?php print $timpo?>"/> formato hh:mm:ss</div>
            <?php
            if(isset($medKm)){
                print "<div>Media por Km: <input type='text' disabled='disabled' value='$medKm'/></div>";
            }
            ?>
            <input type="submit" value="Enviar"/>
        </form>
    </body>
</html>
