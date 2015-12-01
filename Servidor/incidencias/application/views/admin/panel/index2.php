<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php print $titulo; ?></title>
	<?php
	foreach($css_files as $file): ?>
		<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>
	<?php foreach($js_files as $file): ?>
		<script src="<?php echo $file; ?>"></script>
	<?php endforeach; ?>
</head>
<body>
<div>
	<a href='<?php echo site_url('Admin/usuarios')?>'>Usuarios</a> |
	<a href='<?php echo site_url('Admin/incidencias')?>'>Incidencias</a> |
	<a href='<?php echo site_url('Admin/roles')?>'>Roles</a> |
	<a href='<?php echo site_url('Admin/tipos_incidencia')?>'>Tipos Incidencia</a> |
	<a href='<?php echo site_url('Admin/cerrar_session')?>'>Cerrar sesion</a> |


</div>
<div>
	<?php echo $output; ?>
</div>
</body>
</html>