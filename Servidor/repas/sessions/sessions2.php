<?php
session_start();

if(isset($_SESSION['nom'])){
	print "La variable de sesion es:".$_SESSION['nom'];
	print '<a href="sessions_cerrar.php">Cerrar session</a>';
} else {
	print "La sesion esta cerrada";
}



?>


