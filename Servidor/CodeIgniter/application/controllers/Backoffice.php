<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backoffice extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper("url");
    }

    public function index(){

        $view = "backoffice/login.php";
        $this->load->view($view);
    }

    public function validate_user(){

        $user = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);


        $sql =


        print "usuario: ". $user . " pass:".$password;

    }


}