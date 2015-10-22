<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class banner{
    private $ancho;
    private $alto;
    private $mensaje;
    private $imagen;
    private $colorTexto;
    private $colorFondo;
    
    public function __construct($an, $alt, $men) {
        $this->ancho = $an;
        $this->alto = $alt;
        $this->mensaje = $men;
        $this->imagen = imagecreate($this->ancho, $this->alto);
        $this->colorTexto = imagecolorallocate($this->imagen, 255, 255, 0);
        $this->colorFondo = imagecolorallocate($this->imagen, 255, 0, 00);
        imagefill($this->imagen, 0, 0, $this->colorFondo);
        
    }
    
    public function dibujar(){
        imagestring($this->imagen, 5, 50, 10, $this->mensaje, $this->colorTexto);
        header("Content-type: image/png");
        imagepng($this->imagen);
    }
    public function __destruct() {
        imagedestroy($this->imagen);
    }

}

$banner1 = new banner(428, 45, "Sistemas de ventas por mayor y menor.");
$banner1->dibujar();