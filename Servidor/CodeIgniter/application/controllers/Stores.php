<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stores extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Stores_model');
	}

	public function index(){
		print "hola, es la función de entrada del controlador";

		$titulo = "Este es el titulo de la primera pagina";
		$cuerpo = 'Este es el cuerpo de mi pagina';

		$datos = array (
			'titulo' => $titulo,
			'cuerpo' => $cuerpo
		);

		$datos['stores'] = $this->Stores_model->getAllStores();


		//cridar una vista
		$this->load->view("vista", $datos);
	}

	public function prova(){
		print "Funcion  prova";
	}

}
