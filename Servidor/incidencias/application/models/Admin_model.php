<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {
    function __construct() {
        parent::__construct();
        date_default_timezone_set("Europe/Madrid");
        $this->load->library("email");
        $this->load->library("encrypt");
        $this->load->database();
        $this->load->library("Grocery_CRUD");
    }
    public function sendMail($from,$to,$subject,$message,$adjunto = null){
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->cc('');

        if(!is_null($adjunto)) $this->email->attach($adjunto);

        if ($this->email->send()) {
            echo "Error al enviar el mensaje." . $this->email->print_debugger();
        }
    }

    function decrypt_password_callback($value)
    {
        $decrypted_password = $this->encrypt->decode($value);
        return "<input type='password' name='clave' value='$decrypted_password' />";
    }

    function encrypt_password_callback($post_array) {
        $post_array['clave'] = $this->encrypt->encode($post_array['clave']);

        return $post_array;
    }

    function imagen_perfil(){

        $sql = "SELECT logo FROM usuarios WHERE id=".$this->session->userdata('id');
        $query = $this->db->query($sql);
        $image = $query->result();

        //lo hacemos asi para prevenir la diferencia entre separadores de directorios entre linux y windows
        $relative_path = join(DIRECTORY_SEPARATOR, array('assets', 'uploads', 'files', 'profile', ''));
        //seleccionamos si ponemos la imagen estandar o la que tiene el usuario
        $file = FCPATH.$relative_path.$image[0]->logo;

        if(is_file($file)){
            $logo_perfil = "assets/uploads/files/profile/".$image[0]->logo;
        } else {
            $logo_perfil = "assets/admin/dist/img/user_anonymous.png";
        }

        return $logo_perfil;
    }
}