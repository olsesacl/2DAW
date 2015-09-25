<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];

$canal = fopen("datos.txt","a") or die ("Problemas en la creacion.");


fputs($canal, $nombre);
fputs($canal, "\n");

fputs($canal, $descripcion);
fputs($canal, "\n");


fputs($canal, "---------------------------------------\n");


fclose($canal);

echo "Los datos se han guardado con exito!!";
?>
<a href="leer.php">Leer el fichero</a>