<?php

class Menu
{
    private $link = array();
    private $nomLink = array();

    public function __construct(){

    }

    public function mostrarHorizontal(){
        print "<div>";
        $this->mostrar_menu("span");
        print "</div>";
    }
    public function mostrarVertical(){
        print "<div>";
        $this->mostrar_menu("div");
        print "</div>";
    }
    public function mostrar($type){

        if($type == "vertical"){
            $this->mostrarVertical();
        } else {
            $this->mostrarHorizontal();
        }
    }

    private function mostrar_menu($node){

        for($i = 0; $i < count($this->link); $i++){
            print "<".$node." class='node_menu'><a href='".$this->link[$i]."'>".$this->nomLink[$i]."</a></".$node.">";
        }
    }

    public function add_link($nom, $link){

        $this->link[] = $link;
        $this->nomLink[] = $nom;

    }

}