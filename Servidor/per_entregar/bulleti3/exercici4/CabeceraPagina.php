<?php

/**
Confeccionar una clase CabeceraPagina que permita mostrar un t�tulo,
 * indicarle si queremos que aparezca centrado, a derecha o izquierda,
 * adem�s permitir definir el color de fondo y de la fuente.
 */
class CabeceraPagina
{
    private $titulo;
    private $align;
    private $color;
    private $background_color;

    function __construct($titulo = '', $align = '', $color = '', $background_color = '' ){
        $this->titulo = $titulo;
        $this->align = $align;
        $this->color = $color;
        $this->background_color = $background_color;
    }

    function inicializar($titulo = '', $align = '', $color = '', $background_color = '' ){
        $this->titulo = $titulo;
        $this->align = $align;
        $this->color = $color;
        $this->background_color = $background_color;
    }

    function mostrar(){

        $cabecera = '<div style="text-align:'.$this->align.'; color:'.$this->color.';background-color:'.$this->background_color.'">';
        $cabecera .= $this->titulo."</div>";

        print $cabecera;
    }

    /**
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param string $titulo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * @return string
     */
    public function getAlign()
    {
        return $this->align;
    }

    /**
     * @param string $align
     */
    public function setAlign($align)
    {
        $this->align = $align;
    }

    /**
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param string $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function getBackgroundColor()
    {
        return $this->background_color;
    }

    /**
     * @param string $background_color
     */
    public function setBackgroundColor($background_color)
    {
        $this->background_color = $background_color;
    }





}