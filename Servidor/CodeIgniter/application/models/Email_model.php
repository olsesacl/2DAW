<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Email_model extends CI_Model {
    function __construct() {
        parent::__construct();
        date_default_timezone_get("Europe/Madrid");
        $this->load->library("email");
    }
    public function sendMail($from,$to,$subject,$message,$adjunto = null){
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->attached($adjunto);
        
        if ($this->email->send()) {
            echo "Error al enviar el mensaje." . $this->email->print_debugger();
        }
    }
}