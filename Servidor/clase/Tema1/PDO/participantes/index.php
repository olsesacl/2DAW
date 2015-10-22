<?php 
require_once './participante.entidad.php';
require_once './participante.modelo.php';

$part = new Participante1();
$model = new ParticipanteModel();

if(isset($_GET['action'])) {
    if($_GET['action'] == 'editar'){
        $part = $model->obtener($_GET['id']);
    }
}
?>
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
        <style>
            * {
                font: normal 18px "Arial";
            }
            form {
                width: 90%;
                min-width: 300px;
                max-width: 600px;
                margin: auto;
            }
            input {
                display: block;
                height: 35px;
                width: 100%;
                border-radius: 5px;
            }
            input[type='submit']{
                margin-top: 20px;
                background: green;
            }
            input[type='submit']:hover{
                margin-top: 20px;
                background: greenyellow;
            }
            label {
                display: inline-block;
                padding: 10px 0;
                width: 100%;
            }
        </style>
    </head>
    <body>
        <div>
            <form name="form" method="POST">
                <label>Nombre:</label><input type="text" name="nombre" value="" />
                <label>Apellidos:</label><input type="text" name="apellidos" value="" />
                <label>Poblacion:</label><input type="text" name="poblacion" value="" />
                <label>Club:</label><input type="text" name="club" value="" />
                <input type="submit" value="Aceptar" />
            </form>
        </div>
        <table border="1">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Poblacion</th>
                    <th>CLUB</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($model->listar() as $fila){
                        echo "<tr>";
                        echo "<td>" . $fila->__GET("Nombre") . "</td>";
                        echo "<td>" . $fila->__GET("Apellidos") . "</td>";
                        echo "<td>" . $fila->__GET("Poblacion") . "</td>";
                        echo "<td>" . $fila->__GET("CLUB") . "</td>";
                        echo "<td><a href='?action=editar&id=".$fila->__GET("IdParticipante") ."'>Editar</a></td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>
