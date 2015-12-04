<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array("url","admin"));
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

		} else {
			$view = "admin/login.php";
			$this->load->view($view);
		}

	}
	public function validate_user() {
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		if(!$this->Admin_model->validate_user($email, $password)){
			echo "<script>alert('Acceso incorrecto.');</script>";
		}
		//despues siempre redirigimos a index ya que este comprueba si existe sesion y redirige donde corresponda
		$this->index();
	}

	public function cerrar_session(){
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect("/Frontoffice/");
	}

	public function usuarios() {

		check_logged();
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


		//filtro permisos por roles en este caso ponemos mayor que 2 solo podran ver usuarios, no editar ni crear
		if(!check_permisos(1)){
			$crud->where('id',$this->session->userdata('id'));
			$crud->unset_delete();
			$crud->unset_add();
			$output = $crud->render();

			//comprobamos que solo puedan editar su usuario y no acceder por url al de otro
			if(($crud->getState() == "edit" || $crud->getState() == "read") && $this->uri->segments[4]!=$this->session->userdata('id')){
				$return = array(
						'error_permisions' =>  "No tienes acceso a realizar esta accion"
				);

				$output = (object)$return;

			} else {
				//añadimos el numero de seccion en sesion para que asi se muestre bien la plantilla
				$this->session->set_userdata('section', '1');
			}
		} else {
			$output = $crud->render();
			//añadimos el numero de seccion en sesion para que asi se muestre bien la plantilla
			$this->session->set_userdata('section', '1');
		}

		$output->titulo = "Administración de usuarios";
		$this->load->view("admin/panel/index", $output);

	}

	public function incidencias(){
		check_logged();

		$crud = new Grocery_CRUD();
		$crud->set_table('incidencias');
		$crud->set_subject('incidencia');


		//enlace entre tablas
		$crud->set_relation('idtipo','tipos_incidencias','{descripcion}');
		$crud->display_as('idtipo','Tipo');

		//con el tercer parametro podemos filtrar
		$crud->set_relation('idusuario','usuarios','{nombre}',array('idrol' => '3'));
		$crud->display_as('idusuario','Tecnico');


		//typo de datos cuando se añade/edita y que campos nos hacen falta para añadir/editar
		if($crud->getState() == 'add'){

			$crud->field_type('numero','invisible');
			$crud->field_type('persona_detecta','invisible');
			$crud->field_type('fecha_alta','invisible');
			$crud->field_type('estado','invisible');

			$crud->fields('numero','idtipo','descripcion','ubicacion','persona_detecta','fecha_alta','estado');

		} elseif($crud->getState() == 'edit'){

			//relacions entre tables
			$crud->set_relation('persona_detecta','usuarios','{nombre}');

			$crud->field_type('numero', 'readonly');
			$crud->field_type('fecha_fin','readonly', 'invisible');
			$crud->field_type('fecha_alta', 'readonly');
			$crud->field_type('persona_detecta','readonly');
			$crud->field_type('id','hidden');

			$crud->fields('id','numero','idtipo','descripcion','ubicacion','idusuario','persona_detecta','prioridad','fecha_alta','fecha_fin','estado');

		}else{

			//relacions entre tables
			$crud->set_relation('persona_detecta','usuarios','{nombre}');
			//tipo de datos
			$crud->field_type('fecha_alta', 'datetime');
			$crud->field_type('fecha_fin', 'datetime');

			$crud->columns('numero','idtipo','descripcion','ubicacion','idusuario','persona_detecta','prioridad','fecha_alta','fecha_fin','estado');
		}


		$crud->order_by('id');

		//*Deshabilita la opcion Imprimir y exportar*/
		$crud->unset_print();
		$crud->unset_export();

		//filtro datos por roles
		if(check_permisos(4)){
			$crud->where('persona_detecta',$this->session->userdata('id'));
			$crud->unset_delete();
			$crud->unset_edit();

		}else if(check_permisos(2)){ //los coordinadores tienen acceso a todas las incidencais donde el tipo sea donde estan dados de alta
			$crud->or_where('persona_detecta',$this->session->userdata('id'));

			$sql = "SELECT idtipo FROM tipos_incidencias_usuario WHERE idusuario=?";
			$query = $this->db->query($sql,$this->session->userdata('id'));

			$permisos = $query->result();

			foreach($permisos as $permiso){
				$crud->or_where('incidencias.idtipo',$permiso->idtipo);
			}
			$crud->unset_delete();

		}else if(check_permisos(3)){ //los tecnicos tienen acceso a todas las incidencais que tienen asignadas
			$crud->or_where('persona_detecta',$this->session->userdata('id'));

			$crud->or_where('idusuario',$this->session->userdata('id'));

			$crud->unset_delete();
		}


		$crud->callback_before_insert(array($this->Admin_model,'add_incidencia_callback'));
		$crud->callback_before_update(array($this->Admin_model,'edit_incidencia_callback'));


		//añadimos el el numero de seccion en sesion para que asi se muestre bien la plantilla
		$this->session->set_userdata('section', '3');

		$output = $crud->render();
		$output->titulo = "Administración de incidencias";
		$this->load->view("admin/panel/index", $output);
	}

	public function tipos_incidencias(){
		check_logged();
		$crud = new Grocery_CRUD();
		$crud->set_table('tipos_incidencias');
		$crud->set_subject('tipo incidencia');

		$crud->unset_print();
		$crud->unset_export();

		//filtramos para aque solo pueda añadirse un coordinador
		$crud->set_relation_n_n('usuarios', 'tipos_incidencias_usuario', 'usuarios', 'idtipo', 'idusuario', 'nombre','',array('idrol' => '2'));
		$crud->order_by('idtipo');

		//añadimos el el numero de seccion en sesion para que asi se muestre bien la plantilla
		$this->session->set_userdata('section', '3');

		$output = $crud->render();
		$output->titulo = "Administración de tipos de incidencia";
		$this->load->view("admin/panel/index", $output);

	}

	public function roles(){
		check_logged();

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

		//comprobamos acceso a esta seccion
		if(!check_permisos(1)){
			$return = array(
					'error_permisions' =>  "No tienes acceso a realizar esta accion"
			);

			$output = (object)$return;

		} else {
			$output = $crud->render();
		}

		$output->titulo = "Administración de tipos de incidencia";
		$this->load->view("admin/panel/index", $output);

	}

	/*function inicio(){

		$test['test'] = "<script> new Morris.Line({
		  // ID of the element in which to draw the chart.
		  element: 'myfirstchart',
		  // Chart data records -- each entry in this array corresponds to a point on
		  // the chart.
		  data: [
			{ year: '2008', value: 20 },
			{ year: '2009', value: 10 },
			{ year: '2010', value: 5 },
			{ year: '2011', value: 5 },
			{ year: '2012', value: 20 }
		  ],
		  // The name of the data record attribute that contains x-values.
		  xkey: 'year',
		  // A list of names of data record attributes that contain y-values.
		  ykeys: ['value'],
		  // Labels for the ykeys -- will be displayed when you hover over the
		  // chart.
		  labels: ['Value']
		}); </script>";
		$test['titulo'] = "Administración de usuarios";
		$this->load->view("admin/panel/index", $test);

	}*/
}