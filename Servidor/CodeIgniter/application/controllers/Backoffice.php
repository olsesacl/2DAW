<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Backoffice extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper("url");
        $this->load->database();
        $this->load->library("session");
        $this->load->library("encrypt");
        $this->load->library("Grocery_CRUD");
    }
    
    public function index(){
    //    echo "Este es el backoffice";
        $view = "backoffice/login.php";
        $this->load->view($view);
    }
    public function prueba(){
        echo "PRUEBA BACKOFFICE";
    }
    public function validate_user(){
    //    $user = $_POST["username"];
    //    $password = $_POST["password"];
       $user = $this->input->post('username');
       $password = $this->input->post('password');
       
       $sql = "SELECT * FROM cg_user WHERE user_name=? AND user_password=?";
       
       $query = $this->db->query($sql, array($user,$password));
       
       if($query->num_rows() == 1){
           $this->load->view("backoffice/pages/index.php");
           
           $row = $query->row();
           $description=$row->user_description;
           $email=$row->user_email;
           
           $vars_sessions = [
               "user_name" => $user,
               "user_description" => $description,
               "user_email" => $email
           ];
           
           
           $this->session->set_userdata($vars_sessions);
       } else {
           echo "Acceso incorrecto.";
       }
     //   echo $user . ", " . $password;
    }
    public function logout() {
        /*
        $vars_sessions = [
               "user_name" => "null",
               "user_description" => null,
               "user_email" => null
           ];
           $this->session->unset_userdata($vars_sessions);
         */
           $this->session->sess_destroy();
           $this->index();
           
    }
    public function verVariablesSession() {
        echo "Description: " . $this->session->userdata('user_description');
        echo "Nombre: " . $this->session->userdata('user_name');
        echo "Email: " . $this->session->userdata('user_email');
    }
    public function usuarios() {
        echo "Mantenimiento de usuarios";
        $crud = new Grocery_CRUD();
        $crud->set_table("cg_user");
        $output = $crud->render();
        $this->load->view("backoffice/example", $output);
    }
    public function participantes() {
        $output = $this->grocery_crud->render();
        $this->load->view("backoffice/example", $output);
    }
    public function tiendas() {
        
        $crud = new Grocery_CRUD();
        $crud->set_table("cg_store");
        $crud->columns("store_name", "sore_address","store_city","store_state","store_logo","store_area_id");
        $crud->display_as("store_name", "Nombre tienda");
        $crud->display_as("store_address", "Direccion");
        $crud->display_as("store_city", "Ciudad");
        $crud->display_as("store_state", "Provincia");
        $crud->display_as("store_logo", "Logo");
        $crud->display_as("store_area_id", "Zona");
        
        $crud->set_field_upload("store_logo","assets/uploads/files");
        
        $crud->set_relation("store_area_id", "cg_area_store", "area_store_name");
        
        $output = $crud->render();
        $this->load->view("backoffice/example", $output);
    }
}
