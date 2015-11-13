<?php
$dsn = 'mysql:host=127.0.0.1;dbname=tiendas';
$user = 'root';
$password = 'servidor';

try{
	$con = new PDO($dsn, $user, $password);

	$sql = "INSERT INTO participantes(Dorsal, Apellidos, Nombre, Poblacion)
		VALUES (?,?,?,?)";

	$stmt = $con->prepare($sql);

	$dorsal = 1000;
	$apellidos = 'Sanchis';
	$nombre = 'Sergio';
	$poblacio = 'Oliva';

	$dades = array($dorsal, $apellidos, $nombre, $poblacio);

	$numfilas = $stmt->execute($dades);

	if($numfilas > 0){
		print "Insercion correcta";
	}


	$con = null;

}catch (Exception $error){
	print $error->getMessage();
	die();
}

