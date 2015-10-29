<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backoffice extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->helper("url");
    }

    public function index(){

        $view = "backoffice/login.php";
        $this->load->view($view);
    }

    public function validate_user(){

        $user = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);


        $sql = "SELECT * FROM cg_user WHERE user_name = '".$user."' AND user_password = '".$password."'";

        $query = $this->db->query($sql);

        if($query->num_rows() == 1){
            $view = "/backoffice/pages/index.html";
            $this->load->view("$view");
        }

    }


}