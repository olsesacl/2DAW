<?php
header("Content-Type: application/xml");

//$path = './images/ports/4/1/'; # Directorio donde están las imágenes
$path = $_POST["dir"];

# Comprobamos si es un directorio y si lo es nos movemos a el
if (is_dir($path)) {
    $dir = opendir($path);
# Recorremos los ficheros que hay en el directorio y cogemos solamente aquellos cuya extensión
# sea jpg, gif y png y la guardamos en una lista
    while (false !== ($file = readdir($dir))) {
        if (preg_match("#([a-zA-Z0-9_\-\s]+)\.(gif|GIF|jpg|JPG|png|PNG)#is", $file)) {
            $list[] = $file;
        }
    }
# Cerramos el directorio
    closedir($dir);
# Ordenamos la lista
    sort($list);

    foreach($list as $foto) {

        if($foto != "altimetria.jpg"){
            $elementos_xml[] = "<foto>" . $foto . "</foto>";
        }
    }
    echo "<fotos>\n".implode("\n", $elementos_xml)."</fotos>";
}

