<?php

/**
 * Created by PhpStorm.
 * User: 2daw
 * Date: 05/11/15
 * Time: 20:24
 */
class Email_controllers extends CI_Controller
{
    function __construct(){
        parent::__construct();

        $this->load->model('Email_model');
        $this->load->helper('url');
    }

    public function index(){

        $this->load->view('Email_view');
    }
    public function enviar(){

        $to = $this->input->post('Enviara');
        $subject = $this->input->post('Asunto');
        $message = $this->input->post('Mensaje');

        $this->Email_model->sendMail('Sergio', $to, $subject, $message);
    }

}