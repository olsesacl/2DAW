<?php

class Menu{
    
    private $enlaces = array();
    private $titulos = array();
    
    public function cargarOpcion($en, $tit){
        
        $this->enlaces[] = $en;
        $this->titulos[] = $tit;
        
    }
    
    public function mostrar(){
        
        /*print "Array de enlaces<br/>";
        print_r($this->enlaces);
        
        print "<br />";
        
        print "Array de titols";
        print_r($this->titulos);*/
        
        for($i = 0; $i < count($this->enlaces); $i++){
            
            print '<a href="'.$this->enlaces[$i].'">'.$this->titulos[$i].'</a>';
            
            if($i !=  count($this->enlaces)-1){
                print " - ";
            }
            
        }
        
    }
    
    
}

//aplicar la clase
$menu1 = new Menu();

$menu1->cargarOpcion("http://www.google.es", "Buscador Google");
$menu1->cargarOpcion("http://www.yahoo.es", "Buscador Yahoo");
$menu1->cargarOpcion("http://www.msn.es", "Buscador MSN");

$menu1->mostrar();
