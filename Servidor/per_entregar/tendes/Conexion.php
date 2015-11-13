<?php


function conexion()
{

	$username = "root";
	$passwd = "servidor";
	$dbname = "tiendas";
	$dsn = "mysql:host=127.0.0.1;dbname=".$dbname;

	try {
		$con = new PDO($dsn, $username, $passwd);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $con;
	} catch (Exception $ex) {
	}
}
