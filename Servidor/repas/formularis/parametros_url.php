<html>
<head></head>
<body>

<?php

if(!empty($_GET['tabla'])){

	print "tabla: ".$_GET['tabla'];

	print "var2: ".$_GET['var2'];
} else {


	?>

	<a href="./parametros_url.php?tabla=2&var2=25">Pulsa aqui</a>

	<?php

}

?>
</body>
</html>