<htrml>
    <head>
    </head>
    <body>
    <h3>El archivo se ha subido correctamente.</h3>

    <ul>
		<?php
				foreach($upload_data as $key => $value){
					print "<li>$key:$value</li>";
				}
		?>
	</ul>
	<p>
	<?php
	print anchor('upload', 'Transferir otro fichero');
	?>
	</p>
    </body>
</htrml>