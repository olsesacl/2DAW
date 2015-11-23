<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper("url");
		$this->load->database();
		$this->load->library("session");
		$this->load->library("encrypt");
		$this->load->library("Grocery_CRUD");
	}

	public function index() {
		$view = "admin/login.php";
		$this->load->view($view);
	}
	public function validate_user(){
		print "entra";
	}
}