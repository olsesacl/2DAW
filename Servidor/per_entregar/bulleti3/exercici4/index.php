<?php
/**
 * Confeccionar una clase CabeceraPagina que permita mostrar un título,
 * indicarle si queremos que aparezca centrado, a derecha o izquierda,
 * además permitir definir el color de fondo y de la fuente.
 */

include("CabeceraPagina.php");
?>

<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<?php
$cabecera1 = new CabeceraPagina("El Blog del Programador");
$cabecera1->mostrar();
echo "<br />";

$cabecera2 = new CabeceraPagina("El Blog del programador", "center");
$cabecera2->mostrar();
echo "<br />";
$cabecera3 = new CabeceraPagina("El Blog del programador", "right", "#FF0000");
$cabecera3->mostrar();
echo "<br />";
$cabecera4 = new CabeceraPagina("El Blog del programador", "center", "#FF0000", "#FFFF00");
$cabecera4->mostrar();
echo "<br />";
?>


</body>
</html>
