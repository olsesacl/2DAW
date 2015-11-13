<?php
$dsn = 'mysql:host=127.0.0.1;dbname=tiendas';
$user = 'root';
$password = 'servidor';

try{
	$con = new PDO($dsn, $user, $password);

	$sql = "SELECT * FROM participantes ORDER BY Apellidos LIMIT 20";

	foreach($con->query($sql) as $fila){
		print "Apellidos: ".$fila['Apellidos'];
		print " Nombre: ".$fila['Nombre'];
		print " Poblacion: ".$fila['Poblacion']."<br>";
	}

	$con = null;

}catch (Exception $error){
	print $error->getMessage();
	die();
}

