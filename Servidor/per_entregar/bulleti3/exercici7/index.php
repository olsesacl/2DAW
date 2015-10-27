<?php
/**
 * Confeccionar una clase Menu. Permitir añadir la cantidad de opciones
 * que necesitemos. Mostrar el menú en forma horizontal o vertical, pasar a
 * este método como parámetro el texto "horizontal" o "vertical". El método
 * mostrar debe llamar alguno de los dos métodos privados
 * mostrarHorizontal() o mostrarVertical().
 */
include("Menu.php");

?>

<html>
<head>
    <meta charset="UTF-8">
    <style>
        .node_menu{
            padding:5px;
            background-color: #A6AEB5;
        }
        .node_menu:hover{
            background-color: #3F87AB;
        }
    </style>
</head>
<body>
<?php

$menu = new Menu();
$menu->add_link("Google","http://www.google.es");
$menu->add_link("yahoo","http://www.yahoo.es");
$menu->add_link("youtube","http://www.youtube.es");
$menu->add_link("iesmariaenriquez","http://www.iesmariaenriquez.es");
$menu->mostrar("horizontal");

print "</br> ara mostrem vertical <br>";
$menu->mostrar("vertical")
?>


</body>
</html>