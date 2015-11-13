<?php

//a 	es para añadir ficheros, y cuando se hace si no existe lo crea automatico
//w		machaca los datos


$fp = fopen('datos.txt','a');

//añadir datos
fputs($fp, 'Primera linea');
fputs($fp, 'Segunda linea');

//salto de linea en el fichero
fputs($fp,"\n");
fputs($fp, 'Tercera linea');

fclose($fp);