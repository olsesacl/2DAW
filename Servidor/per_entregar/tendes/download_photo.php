<?php

/**
 * este archivo lo he usado para bajar todas las fotos de la
 * web http://comerciodegandia.es/assets/uploads/files/stores/
 *
 * Solo baja la foto 1, si hay mas de momento no se tendran en cuenta
 *
*/
include('Conexion.php');

$conex = conexion();

$sql = "SELECT store_id, store_image_1 FROM cg_store";
$stmt = $conex->prepare($sql);
$stmt->execute(array($id));
$result = $stmt->fetchAll();

foreach($result as $tenda){
    if(isset($tenda['store_image_1'])){
        $imagen = file_get_contents('http://comerciodegandia.es/assets/uploads/files/stores/'.$tenda['store_image_1']);
        file_put_contents('./fotos/'.$tenda['store_id'].'.jpg', $imagen);
    }

}