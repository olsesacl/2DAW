<?php


function conexion()
{

	$username = "root";
	$passwd = "servidor";
	$dbname = "tiendas";
	$host = '127.0.0.1';
	$dsn = "mysql:host=".$host.";dbname=".$dbname;

	try {
		$con = new PDO($dsn, $username, $passwd,array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES \'UTF8\''));
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $con;
	} catch (Exception $ex) {
	}
}
