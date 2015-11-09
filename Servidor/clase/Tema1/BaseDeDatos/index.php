<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        <?php
        $pagina = (isset($_GET['pag']))? $_GET['pag'] : 1;
        
        $PAGE_SIZE = 25;
        $inicio = ($pagina-1) * $PAGE_SIZE;
            $con = mysqli_connect("127.0.0.1", "root", "servidor", "Carreras");
            if(mysqli_connect_errno($con)){
                echo "Fallo al conectar MYSQL" . mysqli_connect_error();
            } else {
                $sql ="SELECT * FROM participantes ORDER BY Apellidos LIMIT $inicio, $PAGE_SIZE";
                $filas = mysqli_query($con, $sql);
                /*
                $sql2 = "SELECT * FROM participantes";
                $totalFilas = mysqli_query($con, $sql2);
                $numTotalReg = mysqli_num_rows($totalFilas);
                */
                
                $sql2 = "SELECT COUNT(*) as total FROM participantes";
                $result2 = mysqli_query($con, $sql2);
            //    print_r($result2);
                $totalRegistros;
                foreach ($result2 as $result){
                    $totalRegistros = $result['total'];
                }
                $totalPaginas = ceil($totalRegistros / $PAGE_SIZE);
                
                echo "<a href='insertar.php'>Insertar</a>";
                
                echo "<table border='1'>"
                . "<th>Apellidos</th>"
                        . "<th>Nombre</th>"
                        . "<th>Poblacion</th>"
                        . "<th>Club</th>"
                        . "<th>ACCION</th>";
                foreach ($filas as $fila){
                    echo "<tr>";
                    echo "<td>" . $fila['Apellidos'] . "</td>";
                    echo "<td>" . $fila['Nombre'] . "</td>";
                    echo "<td>" . $fila['Poblacion'] . "</td>";
                    echo "<td>" . $fila['CLUB'] . "</td>";
                    echo "<td>";
                        echo "<a href='borrar.php?id=" . $fila['IdParticipante'] . "'>Borrar</a>";
                        echo " | ";
                        echo "<a href='editar.php?id=" . $fila['IdParticipante'] . "'>Editar</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            
            for ($i = 1; $i <= $totalPaginas; $i++){
                echo "<a href='index.php?pag=$i'>$i</a>";
            }
            
            
            mysqli_close($con);
        ?>
    </body>
</html>