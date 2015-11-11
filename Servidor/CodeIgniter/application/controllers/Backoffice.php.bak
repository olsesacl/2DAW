<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backoffice extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->database();//poder tener acceso a la base de datos
        $this->load->helper('url');//poder usar base_url
        $this->load->library('session');//para poder usar las sesiones
        $this->load->library('encrypt');//poder usar funciones de encriptacion
    }

    public function index(){

        $view = "backoffice/login.php";
        $this->load->view($view);
    }

    public function validate_user(){

        $user = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);


        $sql = "SELECT * FROM cg_user WHERE user_name =? AND user_password =?";

        $query = $this->db->query($sql, array($user, $password));

        if($query->num_rows() == 1){

            $row = $query->row();
            $description = $row->user_description;
            $email = $row->email;

            //guardamos las variables de sesion
            $variables_sesio = array(
                                'username' => $user,
                                'userdescription'=> $description,
                                'useremail'=>$email
            );
            $this->session->set_userdata($variables_sesio);

            $view = "/backoffice/pages/index.php";
            $this->load->view("$view");
        } else {
            print "<div style='background-color:white'>Error al iniciar sesion</div>";
            $this->index();
        }

    }

    public function logout(){

        $this->session->sess_destroy();

        $this->index();

    }

    public function voreVariables(){
        print "Description: ".$this->session->userdata('userdescription');
    }


}