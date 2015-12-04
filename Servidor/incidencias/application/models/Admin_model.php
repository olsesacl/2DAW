<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {
    function __construct() {
        parent::__construct();
        date_default_timezone_set("Europe/Madrid");
        $this->load->library("encrypt");
        $this->load->database();
        $this->load->library("Grocery_CRUD");
        $this->load->library("email");
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
        if (count($emails) > 0){

            //montamos el mensaje en html
            $message = "<div>Numero de inidencia: ".$post_array['numero']."</div>";
            $message .= "<div>Descripcion:</div>";
            $message .= $post_array['descripcion'];
            $message .= "<div>Ubicacion: ".$post_array['ubicacion']."</div>";

            $subject = "Nueva incidencia";

            $this->send_email($subject, $message, $emails);
        }

        return $post_array;
    }
    function edit_incidencia_callback($post_array){

        //comprobamos para enviar un email al tecnico nuevo
        $nuevo_tecnito = $post_array['idusuario'];

        if(isset($nuevo_tecnito) && $nuevo_tecnito !=''){

            $sql = 'SELECT idusuario,numero,estado FROM incidencias WHERE id=?';
            $query = $this->db->query($sql, $post_array['id']);
            $results = $query->result();

            $antituo_tecnico = $results[0]->idusuario;
            $numero_incidencia = $results[0]->numero;
            $estado_antes = $results[0]->estado;

            if($nuevo_tecnito != $antituo_tecnico){

                $sql = 'SELECT email FROM usuarios WHERE id=?';
                $query = $this->db->query($sql, $nuevo_tecnito);
                $results = $query->result();
                $emails = $results[0]->email;

                //montamos el mensaje en html
                $message = "<div>Numero de inidencia: ".$numero_incidencia."</div>";
                $message .= "<div>Descripcion:</div>";
                $message .= $post_array['descripcion'];
                $message .= "<div>Ubicacion: ".$post_array['ubicacion']."</div>";

                $subject = "Se le ha asignado la incidencia ".$numero_incidencia;

                $this->send_email($subject, $message, $emails);
            }
        }

        //aqui comprobamos si se ha cerrado y si es asi ponemos fecha de fin
        $estado = $post_array['estado'];
        if($estado == 'CERRADA' && $estado_antes!=$estado){

            $post_array['fecha_fin'] = date('Y-d-m H:i:s');

            //al cerrarse la incidencia se envia un email a quien creo la incidencia, usaremos los mismos datos que antes para el cuerpo del email
            $subject = "Se ha cerrado la incidencia ".$numero_incidencia;

            //montamos el mensaje en html
            $message = "<div>Numero de inidencia: ".$numero_incidencia."</div>";
            $message .= "<div>Descripcion:</div>";
            $message .= $post_array['descripcion'];
            $message .= "<div>Ubicacion: ".$post_array['ubicacion']."</div>";

            //añadimos al usuario que ha dado parte de la incidencia
            $sql = 'SELECT email FROM usuarios u, incidencias i WHERE i.id=? AND u.id=i.persona_detecta';
            $query = $this->db->query($sql, $post_array['id']);
            $results = $query->result();
            $emails[] = $results[0]->email;

            //añadimos los emails de los coordinadores de esas categorias
            $sql = 'SELECT email FROM usuarios u, tipos_incidencias_usuario t WHERE u.id = t.idusuario AND idtipo=?';
            $query = $this->db->query($sql, $post_array['idtipo']);
            $results = $query->result();

            foreach($results as $result){
                $emails[]=$result->email;
            }


            $this->send_email($subject, $message, $emails);
        }


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