<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {
    function __construct() {
        parent::__construct();
        date_default_timezone_set("Europe/Madrid");
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

    function validate_user($email, $password){

        $sql = "SELECT id, clave, nombre, logo FROM usuarios WHERE email=?";

        $query = $this->db->query($sql, array($email));

        $row = $query->row();
        if ($query->num_rows() == 1) {

            $claveCifrada = $row->clave;
            $claveDescodificada = $this->encrypt->decode($claveCifrada);

            if ($password == $claveDescodificada) {

                $newdata = array(
                    'id'		=> $row->id,
                    'user_name' => $row->nombre,
                    'user_email'=> $email,
                    'logged_in' => TRUE
                );

                $this->session->set_userdata($newdata);

            } else {
                return false;
            }
        } else {
            return false;
        }
        return true;
    }

    function add_incidencia_callback($post_array){
        $this->load->library("email");

        //añadimos los datos que faltan y son automaticos
        $post_array['numero'] = date('YmdHis');
        $post_array['persona_detecta'] = $this->session->userdata('id');
        $post_array['fecha_alta']= date('Y-d-m H:i:s');
        $post_array['estado'] = 'ABIERTA';

        //procedemos al envio del email a los responsables de ese tipo de incidencias
        $sql = 'SELECT email FROM usuarios u, tipos_incidencias_usuario t WHERE u.id = t.idusuario AND idtipo=?';
        $query = $this->db->query($sql, $post_array['idtipo']);
        $results = $query->result();

        $emails =array();
        foreach($results as $result){
            $emails[]=$result->email;
        }

        //montamos el mensaje en html
        $message = "<div>Numero de inidencia: ".$post_array['numero']."</div>";
        $message .= "<div>Descripcion:</div>";
        $message .= $post_array['descripcion'];
        $message .= "<div>Ubicacion: ".$post_array['ubicacion']."</div>";

        $subject = "Nueva incidencia";

        $this->send_email($subject, $message, $emails);


        return $post_array;
    }

    function send_email($subject, $message, $emails){

        $this->email->from('daw@iesmariaenriquez.es', 'Incidencias Website');
        $this->email->to($emails);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();

    }
}