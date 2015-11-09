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
        $dsn = "mysql:host=127.0.0.1;dbname=Carreras";
        $username = "root";
        $passwd = "servidor";
        
        try {
            $mdb = new PDO($dsn, $username, $passwd);
            
            $mdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            
            foreach ($mdb->query("SELECT * FROM participantes ORDER BY Apellidos") as $row){
            //    print_r($row);
                echo "Apellido: ".$row['Apellidos'];
                echo "<br />";
            }
            
        } catch (Exception $ex) {
            echo "Error: " . $ex->getMessage();
        }
            
            
            $mdb = null;
        ?>
    </body>
</html>
