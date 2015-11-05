<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stores extends CI_Controller {
    function __construct() {
        parent::__construct();
        
        $this->load->model("Stores_model");
    }
    public function prueba () {
        echo "Funcion de prueba";
    }
    public function index() {
        $datos = array(
                'titulo' => 'Mi pagina',
                'cuerpo' => 'ESTA ES MI WEB'
            );
        
        $datos['stores'] = $this->Stores_model->getAllStores();
        
        $this->load->view("vista", $datos);
    }

}
