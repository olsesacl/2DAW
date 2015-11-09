<?php
include './connectDB.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$db = connect();

$result = mysqli_query($db, "select * from usuarios order by nombre;");


echo "<table border='1'>";
echo "<tr>"
        . "<td>ID</td>"
        . "<td>USUARIO</td>"
        . "<td>CLAVE</td>"
        . "<td>EMAIL</td>"
        . "</tr>";
while($row = mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['nombre'] . "</td>";
    echo "<td>" . $row['clave'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "</tr>";
}
echo "</table>";
disconnect($db);