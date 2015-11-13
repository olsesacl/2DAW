<?php

$host = 'localhost';
$user = 'root';
$pass = 'servidor';
$database = 'tiendas';

$con = mysqli_connect($host, $user, $pass, $database);

if(mysqli_connect_errno($con)){
	print "Ha fallado la conexion: ".mysqli_connect_error();
} else {
	print "Conexion correcta";



/*insertar dades
	$sql = "INSERT INTO participantes(Dorsal, Apellidos, Nombre, Poblacion)
		VALUES (10000, 'Sanchis', 'Sergio', 'Oliva')";
	if(!mysqli_query($con,$sql)){
		die('Error al insertar:'.mysqli_error($con));
	}

	print "<br>Registre afegit.";
*/

	//fer un select
	/*$sql = "SELECT * FROM participantes ORDER BY Apellidos LIMIT 20";

	$result = mysqli_query($con,$sql);

	while($fila = mysqli_fetch_array($result)){
		print "Apellidos: ".$fila['Apellidos'];
		print " Nombre: ".$fila['Nombre'];
		print " Poblacion: ".$fila['Poblacion']."<br>";
	}*/





	mysqli_close($con);
}


print "<br><br>";

//conectar por objetos
$mysqli = new mysqli($host, $user,$pass,$database);

if($mysqli->connect_errno){
	print "Ha fallado la conexion: ".$mysqli->connect_error;
}
else {
	print "conexion correcta amb objectes";

	//insertar dades
	/*$sql = "INSERT INTO participantes(Dorsal, Apellidos, Nombre, Poblacion)
		VALUES (20000, 'Sanchis', 'Sergio', 'Oliva')";

	if(!$mysqli->query($sql)){
		print "Error al insertar: ".$mysqli->errno.": ".$mysqli->error;
	}*/


	//fer un select
	$sql = "SELECT * FROM participantes ORDER BY Apellidos LIMIT 20";

	if($resultado = $mysqli->query($sql)){
		while($fila = $resultado->fetch_object()){	//tambe podria gastar-se fetch_array i tornaria un array com dalt
			print "Apellidos: ".$fila->Apellidos;
			print " Nombre: ".$fila->Nombre;
			print " Poblacion: ".$fila->Poblacion."<br>";
		}
	}


	$mysqli->close();
}