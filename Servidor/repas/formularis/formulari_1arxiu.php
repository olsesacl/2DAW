<html>
<head></head>
<body>

<?php
if(!empty($_POST['enviar'])){

	$nombre = $_POST['nombre'];

	print "El nom es ".$nombre;

} else {
	?>
	<form action="formulari_1arxiu.php" enctype="application/x-www-form-urlencoded" method="post">

		<input type="text" name="nombre">
		<input type="submit" name="enviar" value="enviar">


	</form>
	<?php
}
?>
</body>
</html>