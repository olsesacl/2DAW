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

		$this->load->model("Admin_model");
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

		$sql = "SELECT id, clave, nombre, logo FROM usuarios WHERE email=?";

		$query = $this->db->query($sql, array($email));

		$row = $query->row();
		if ($query->num_rows() == 1) {

			$claveCifrada = $row->clave;
			$claveDescodificada = $this->encrypt->decode($claveCifrada);

			if ($password == $claveDescodificada) {

				$newdata = array(
						'id'		=> $row->id,
						'user_name' => $row->nombre,
						'user_email'=> $email,
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

	public function usuarios() {

		$crud = new Grocery_CRUD();
		$crud->set_table('usuarios');
		$crud->set_subject('usuario');
		$crud->columns('id','email','nombre','idrol');

		//los campos que se mostraran al editar o añadir
		$crud->fields('email', 'clave','nombre','idrol', "logo");

		//elegimos los campos que se mostraran al ver el registro
		$crud->set_read_fields('id','email','nombre','idrol',"logo");

		$crud->field_type('clave', 'password');

		//relaciones entre tablas
		$crud->set_relation('idrol','roles','{descripcion}');
		$crud->display_as('idrol','Rol');

		//columna donde se guardaran las imagenes de perfil
		$crud->set_field_upload("logo", "assets/uploads/files/profile");

		//cuando se inserta un nuevo usuario o se actualiza codifica la clave antes de guardarla
		$crud->callback_before_insert(array($this->Admin_model,'encrypt_password_callback'));
		$crud->callback_before_update(array($this->Admin_model,'encrypt_password_callback'));

		//para al editar si no se cambia la clave que se mantenga
		$crud->callback_edit_field('clave',array($this->Admin_model,'decrypt_password_callback'));


		$crud->columns('id', 'nombre', 'email', 'email2', 'idrol', 'logo');
		$crud->order_by('id');

		//*Deshabilita la opcion Imprimir y exportar*/
		$crud->unset_print();
		$crud->unset_export();

		$output = $crud->render();

		//añadimos el el numero de seccion en sesion para que asi se muestre bien la plantilla
		$this->session->set_userdata('section', '1');

		$output->titulo = "Administración de usuarios";
		$output->logo_perfil = $this->Admin_model->imagen_perfil();
		$this->load->view("admin/panel/index", $output);


	}

	public function incidencias(){

		$crud = new Grocery_CRUD();
		$crud->set_table('incidencias');
		$crud->set_subject('incidencia');

		//enlaces entre tablas
		$crud->set_relation('idusuario','usuarios','{nombre}');
		$crud->display_as('idusuario','Usuario');

		$crud->set_relation('idtipo','tipos_incidencias','{descripcion}');
		$crud->display_as('idtipo','Tipo');

		//tipo de datos
		$crud->field_type('fecha_alta', 'datetime');
		$crud->field_type('fecha_fin', 'datetime');

		$crud->columns('id','numero','idtipo','descripcion','ubicacion','idusuario','persona_detecta','prioridad','fecha_alta','fecha_fin','estado');
		$crud->order_by('id');

		//*Deshabilita la opcion Imprimir y exportar*/
		$crud->unset_print();
		$crud->unset_export();


		//añadimos el el numero de seccion en sesion para que asi se muestre bien la plantilla
		$this->session->set_userdata('section', '3');

		$output = $crud->render();
		$output->titulo = "Administración de incidencias";
		$output->logo_perfil = $this->Admin_model->imagen_perfil();
		$this->load->view("admin/panel/index", $output);
	}

	public function tipos_incidencias(){
		$crud = new Grocery_CRUD();
		$crud->set_table('tipos_incidencias');
		$crud->set_subject('tipo incidencia');

		$crud->unset_print();
		$crud->unset_export();

		$crud->set_relation_n_n('usuarios', 'tipos_incidencias_usuario', 'usuarios', 'idtipo', 'idusuario', 'nombre','');
		$crud->order_by('idtipo');

		//añadimos el el numero de seccion en sesion para que asi se muestre bien la plantilla
		$this->session->set_userdata('section', '3');

		$output = $crud->render();
		$output->titulo = "Administración de tipos de incidencia";
		$output->logo_perfil = $this->Admin_model->imagen_perfil();
		$this->load->view("admin/panel/index", $output);

	}

	public function roles(){
		$crud = new Grocery_CRUD();
		$crud->set_table('roles');
		$crud->set_subject('rol');

		$crud->unset_print();
		$crud->unset_export();

		$crud->display_as('idrol','Id');
		$crud->display_as('rol','Codigo rol');
		$crud->display_as('descripcion','Descripcion');
		$crud->display_as('nivel','Nivel');

		$crud->columns('idrol', 'rol', 'descripcion', 'nivel');

		//añadimos el el numero de seccion en sesion para que asi se muestre bien la plantilla
		$this->session->set_userdata('section', '2');

		$output = $crud->render();
		$output->titulo = "Administración de tipos de incidencia";
		$output->logo_perfil = $this->Admin_model->imagen_perfil();
		$this->load->view("admin/panel/index", $output);

	}
}