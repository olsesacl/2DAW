<?php
session_start();

unset($_SESSION['nom']);
session_destroy();

print "Sesion cerrada<br>";

//print "<a href='sessions2.php'>ir a siguiente pagina</a>";

header("Location: sessions2.php");