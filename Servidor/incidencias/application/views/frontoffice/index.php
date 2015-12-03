<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Incidencias</title>
	<link href="<?php print base_url() ?>assets/frontoffice/css/tabla.css" rel="stylesheet">
</head>
<body>
<div><a href="<?php print site_url("Admin/index");?>">Panel de control</a></div>
<table border="1">
	<thead>
	<tr>
		<th>numero</th>
		<th>descripcion</th>
		<th>estado</th>
	</tr>
	</thead>
	<tbody>
	<?php
	foreach ($incidencias as $incidencia) {
		print "<tr>";
		print "<td>" . $incidencia->numero . "</td>";
		print "<td>" . $incidencia->descripcion . "</td>";
		print "<td><span";
		if($incidencia->estado=="CERRADA"){
			print " class='label label-success'";
		}else if($incidencia->estado=="ABIERTA"){
			print " class='label label-danger'";
		}else if($incidencia->estado=="EN PROCESO"){
			print " class='label label-warning'";
		}
		print ">".$incidencia->estado;
		print "<span></td>";
		print "</tr>";
	}
	?>
	</tbody>
</table>

</body>
</html>