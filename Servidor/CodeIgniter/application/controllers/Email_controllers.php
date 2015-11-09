<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Email_controllers extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("Email_model");
    }
    public function index() {
        echo "Hola desde el controlador Email_controllers";
        $this->load->view("Email_view");
    }
    public function enviar() {
        $to = $this->input->post("to");
        $emails = explode(";", $to);
        $subject = $this->input->post("subject");
        $message = $this->input->post("message");
        $adjunto = $this->input->post("adjunto");
        
        if(isset($_FILES["adjunto"]["name"]) && !is_null($_FILES["adjunto"]["name"])) {
            $name = $_FILES["adjunto"]["name"];
            $tname = $_FILES["adjunto"]["tmp_name"];
            
            $directorio = base_url() . "assets/uploads/files/".$name;
            move_uploaded_file($tname, $directorio);
        }
        
        $this->Email_model->sendMail("Lucia",$emails,$subject,$message,$adjunto);
        
    }
}