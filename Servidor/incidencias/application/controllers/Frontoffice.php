<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontoffice extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array("url"));
		$this->load->database();
		$this->load->helper('date');
		$this->load->model("Frontoffice_model");
	}

	public function index() {

		$datos['incidencias'] = $this->Frontoffice_model->cargar_incidencias();


		$view = "frontoffice/index.php";
		$this->load->view($view,$datos);

	}
}