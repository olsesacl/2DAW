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
            
            if(check_hora($t)){
            
                $s = pasar_segundos($t);

                //ahora dividimos el tiepmo entre la distancia(metros) para saber al metro cuanto tarda
                $result = $s/$d;
                $result = $result * 1000; //porque queremos saber cuanto tarda por Km
                
                $result = second2hora($result);
                
                
                
                return formato_hora($result[0],$result[1], $result[2]);
            } else {
                print "El formato de hora es incorrecto. hh:mm:ss";
            }
        }
        
        function second2hora($s){
        //pasamos el resultado en formato hh:mm:ss
            $h = floor(($s/(60*60)));
            $result = ($s%(60*60));

            $m = floor($result/60);
            $s = $result%60;
            
            //ponemos las variables con dos digitos
            $t[0] = check2carac($h);
            $t[1] = check2carac($m);
            $t[2] = check2carac($s);
            
            return $t; 
        }
        
        function pasar_segundos($t){
            //recogemos los valores por separado
                $h = substr($t,0,2);
                $m = substr($t,3,2);
                $s = substr($t,6,2);

                //pasamos todos los tiempos a segundos para hacer el calculo con ellos
                $m = $m + ($h * 60);
                $s = $s + ($m * 60);
                
                return $s;
        }
        
        function formato_hora($h, $m, $s){
            //ponemos las variables con dos digitos
            $h = check2carac($h);
            $m = check2carac($m);
            $s = check2carac($s);

            return "$h:$m:$s";
        }
        
        function check_hora($t){
            return preg_match("/(2[0-4]|[01][1-9]|10):([0-5][0-9])/", $t);
        }
        
        function check2carac($num){
            if((int)$num < 10){
                $num = "0".(int)$num;
            }
            return $num;
        }
        ?>
        <form action="index.php" method="POST">
            <div>Distancia: <input type="text" name="distancia" value="<?php print $distancia?>"/> metros</div> 
            <div>Tiempo: <input type="text" name="tiempo" value="<?php print $tiempo?>"/> formato hh:mm:ss</div>
            <?php
            if(isset($medKm)){
                print "<div>Media por Km: <input type='text' disabled='disabled' value='$medKm'/></div>";
            }
            ?>
            <input type="submit" value="Enviar"/>
        </form>

        <?php
        print "<br /><br /><div>Plan de carrera a $medKm Kilometro</div>"
                . "<table border='1'>";
        print "<tr><td>Distancia (Kilometros)</td><td>Distancia(m)</td><td>Tiempo de paso</td>";
        
        for($i = 1; $i <= floor($distancia/1000); $i++){
            
            //pasamos el tiempo medio a segundos
            $s = pasar_segundos($medKm);
            
            $s = $s * $i;
            $result = second2hora($s);
            $t = formato_hora($result[0],$result[1], $result[2]);
            
             print "<tr><td>$i</td><td>".($i * 1000)."</td><td>".$t."</td>";
        }
        
        print "</table>";
            
        ?>
    </body>
</html>
