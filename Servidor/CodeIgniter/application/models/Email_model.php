<?php


class Email_model extends CI_Model
{
    function __construct(){
        parent::__construct();

        $this->load->library('email');
    }

    public function sendMail($from, $to, $asunto, $mensaje, $ficheroAdjunto = null){
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($asunto);
        $this->email->message($mensaje);

        if(!$this->email->send()){
            print 'Error en el envio del email'.$this->email->print_debuger();
        }

    }

}