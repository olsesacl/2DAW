<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('imagen_perfil')){
    function imagen_perfil(){
        $CI=& get_instance();
        $CI->load->database();
        $CI->load->library("session");

        $sql = "SELECT logo FROM usuarios WHERE id=?";
        $query = $CI->db->query($sql,$CI->session->userdata('id'));
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

        return base_url().$logo_perfil;
    }

}


if(!function_exists('tareas_pendientes')){
    /**
     * @param int $select if 1 -> en proceso 2->abieras
     * @return mixed
     */
    function tareas_pendientes($select=1){
        $CI=& get_instance();
        $CI->load->database();
        $CI->load->library("session");

        $sql = "SELECT COUNT(*) as numero FROM incidencias WHERE estado=?";
        $query = '';

        //pongo mayor que 2 porque esos dos tendran acceso a todas las incidencias, el resto solo veran las suyas
        if(id_rol()>2){
            $sql .= " AND persona_detecta=?";
            if($select==1)$query = $CI->db->query($sql,array("EN PROCESO",$CI->session->userdata('id')));
            if($select==2)$query = $CI->db->query($sql,array("ABIERTA",$CI->session->userdata('id')));
        } else {
            if($select==1)$query = $CI->db->query($sql,"EN PROCESO");
            if($select==2)$query = $CI->db->query($sql,"ABIERTA");
        }


        return $query->row(0)->numero;
    }

}

if(!function_exists('id_rol')){
    function id_rol(){
        $CI=& get_instance();
        $CI->load->database();
        $CI->load->library("session");

        $sql = "SELECT idrol FROM usuarios WHERE id=?";
        $query = $CI->db->query($sql,$CI->session->userdata('id'));

        return $query->row(0)->idrol;
    }
}

if(!function_exists('check_logged')){

    function check_logged() {

        $CI=& get_instance();
        $CI->load->database();
        $CI->load->library("session");

        if (!$CI->session->userdata('logged_in')) {
            redirect(base_url());
        }
    }
}