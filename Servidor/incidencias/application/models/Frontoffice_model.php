<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontoffice_model extends CI_Model {
	function __construct() {
		parent::__construct();
		date_default_timezone_set("Europe/Madrid");
		$this->load->database();
		$this->load->helper('date');
		$this->load->helper("url");
	}
	function cargar_incidencias(){
		$sql = "SELECT numero, descripcion, estado FROM incidencias ORDER BY fecha_alta";

		$query = $this->db->query($sql);

		if($query->num_rows() > 0) {
			return $query->result();
		}

	}
}