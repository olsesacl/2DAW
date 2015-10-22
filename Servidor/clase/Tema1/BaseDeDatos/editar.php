<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$id = $_GET['id'];

$con = mysqli_connect("127.0.0.1", "root", "servidor", "Carreras");
    if(mysqli_connect_errno($con)){
        echo "Fallo al conectar MYSQL" . mysqli_connect_error();
    } else {
        $sql = "DELETE FROM participantes WHERE IdParticipantes = $id";
    }

    
    $sql = "SELECT * FROM participantes WHERE IdParticipante=$id";
    $result = mysqli_query($con, $sql);
    
    while ($row = mysqli_fetch_array($result)){
        $apellidos = $row['Apellidos'];
        $nombre = $row['Nombre'];
        $poblacion = $row['Poblacion'];
        $club = $row['CLUB'];
    }
    
    mysqli_close($con);
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title></title>
        <style type="text/css">
            
            input {
                display: block;
            }
        </style>
    </head>
    <body>
        <form name="form1" method="POST" action="actualizar.php?<?php echo 'id=' . $id ?>">
            Apellidos: <input type="text" name="apellidos" value="<?php echo $apellidos ?>" />
            Nombre:  <input type="text" name="nombre" value="<?php echo $nombre ?>" />
            Poblacion: <input type="text" name="poblacion" value="<?php echo $poblacion ?>" />
            Club: <input type="text" name="club" value="<?php echo $club ?>" />
            <input type="submit" value="Actualizar" name="submit" />
        </form>
    </body>
</html>