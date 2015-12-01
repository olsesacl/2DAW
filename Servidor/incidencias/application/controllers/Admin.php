<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper("url");
		$this->load->database();
		$this->load->library("session");
		$this->load->library("encrypt");
		$this->load->helper('date');
		$this->load->library("Grocery_CRUD");
	}

	public function index() {
		if( $this->session->userdata('logged_in') ) {
			redirect("/Admin/incidencias");
			$this->incidencias();
		} else {
			$view = "admin/login.php";
			$this->load->view($view);
		}

	}
	public function validate_user() {
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$sql = "SELECT id, clave, nombre FROM usuarios WHERE email=?";

		$query = $this->db->query($sql, array($email));

		$row = $query->row();
		if ($query->num_rows() == 1) {

			$claveCifrada = $row->clave;
			$claveDescodificada = $this->encrypt->decode($claveCifrada);

			if ($password == $claveDescodificada) {

				$newdata = array(
						'id'		=> $row->id,
						'user_name'  => $row->nombre,
						'user_email'     => $email,
						'logged_in' => TRUE
				);

				$this->session->set_userdata($newdata);

			} else {
				echo "<script>alert('Acceso incorrecto.');</script>";
			}
		} else {
			echo "<script>alert('Acceso incorrecto.');</script>";
		}
		$this->index();
	}

	public function cerrar_session(){
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		$this->index();
	}

	public function check_session(){

		if( $this->session->userdata('logged_in') ) {
			return true;
		} else {
			$this->index();
		}
	}

	public function usuarios() {
		if($this->check_session()){

			$crud = new Grocery_CRUD();
			$crud->set_table('usuarios');
			$crud->set_subject('usuario');
			$crud->columns('id','email','nombre','idrol');

			$crud->field_type('clave', 'password');

			//relaciones entre tablas
			$crud->set_relation('idrol','roles','{descripcion}');
			$crud->display_as('idrol','Rol');

			//code clave
			$crud->callback_before_insert(array($this,'encrypt_password_callback'));
			$crud->callback_before_update(array($this,'encrypt_password_callback'));

			$crud->columns('id', 'nombre', 'email', 'email2', 'idrol');
			$crud->order_by('id');

			//*Deshabilita la opcion Imprimir y exportar*/
			$crud->unset_print();
			$crud->unset_export();

			$output = $crud->render();

			$output->titulo = "Administración de usuarios";

			$this->load->view("admin/panel/index", $output);
		}

	}

	function encrypt_password_callback($post_array) {
		$post_array['clave'] = $this->encrypt->encode($post_array['clave']);

		return $post_array;
	}

	public function incidencias(){
		if($this->check_session()){
			$crud = new Grocery_CRUD();
			$crud->set_table('incidencias');
			$crud->set_subject('incidencia');

			//enlaces entre tablas
			$crud->set_relation('idusuario','usuarios','{nombre}');
			$crud->display_as('idusuario','Usuario');

			$crud->set_relation('idtipo','tipos_incidencias','{descripcion}');
			$crud->display_as('idtipo','Tipo');

			//tipo de datos
			$crud->field_type('fecha_alta', 'date');

			$crud->columns('id','numero','idtipo','descripcion','ubicacion','idusuario','persona_detecta','prioridad','fecha_alta','fecha_fin','estado');
			$crud->order_by('id');

			//*Deshabilita la opcion Imprimir y exportar*/
			$crud->unset_print();
			$crud->unset_export();

			$output = $crud->render();
			$output->titulo = "Administración de incidencias";
			$output->user_name= $this->session->unset_userdata('user_name');
			$this->load->view("admin/panel/index", $output);
		}

	}
}