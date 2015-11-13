<?php
session_start();

?>
<html>
<head></head>
<body>

<?php

if(!empty($_POST['enviar'])){

	$_SESSION['nom'] = $_POST['nombre'];

	print "Se ha almacenazo la variable de sesion";
	print "<a href='sessions2.php'>ir a siguiente pagina</a>";


}else {

	?>

	<form enctype="application/x-www-form-urlencoded" method="post" action="sessions.php">

		<input type="text" name="nombre">
		<input type="submit" name="enviar" value="enviar">
	</form>

	<?php
}
?>
</body>
</html>
