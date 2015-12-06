<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Incidencias</title>
	<link href="<?php print base_url() ?>assets/frontoffice/css/tabla.css" rel="stylesheet">
	<link href="<?php print base_url() ?>assets/frontoffice/css/paginador.css" rel="stylesheet">
</head>
<body>
<div class="linees">
	<a href="<?php print site_url("admin/index");?>">Panel de control</a>
</div>
<div style="clear: both;"></div>
<div id="tabla"><table border="1">
	<thead>
	<tr>
		<th>Numero</th>
		<th>Descripcion</th>
		<th>Estado</th>
	</tr>
	</thead>
	<tbody>
	<?php
	foreach ($incidencias->datos as $incidencia) {
		print "<tr>";
		print "<td>" . $incidencia->numero . "</td>";
		print "<td>" . $incidencia->descripcion . "</td>";
		print "<td><div";
		if($incidencia->estado=="CERRADA"){
			print " class='label label-success'";
		}else if($incidencia->estado=="ABIERTA"){
			print " class='label label-danger'";
		}else if($incidencia->estado=="EN PROCESO"){
			print " class='label label-warning'";
		}
		print ">".$incidencia->estado;
		print "</div></td>";
		print "</tr>";
	}
	?>
	</tbody>
</table>
	<?php print $incidencias->pagination; ?>
</div>

</body>
</html>