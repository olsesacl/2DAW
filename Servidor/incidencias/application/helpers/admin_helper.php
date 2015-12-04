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

       //depende del tipo de rol que tenga se le mostraran unas u otras
        if(check_permisos(4)){
            $sql .= " AND persona_detecta=?";
            if($select==1)$query = $CI->db->query($sql,array("EN PROCESO",$CI->session->userdata('id')));
            if($select==2)$query = $CI->db->query($sql,array("ABIERTA",$CI->session->userdata('id')));

       }elseif(check_permisos(2)){


            $sql .= " AND (persona_detecta=?";

            $sql2 = "SELECT idtipo FROM tipos_incidencias_usuario WHERE idusuario=?";
            $query = $CI->db->query($sql2,$CI->session->userdata('id'));

            $permisos = $query->result();

            foreach($permisos as $permiso){
                $sql.= " OR incidencias.idtipo = ".$permiso->idtipo;
            }
            $sql .= ")";

            if($select==1)$query = $CI->db->query($sql,array("EN PROCESO",$CI->session->userdata('id')));
            if($select==2)$query = $CI->db->query($sql,array("ABIERTA",$CI->session->userdata('id')));


        }elseif(check_permisos(3)){


            $sql .= " AND (persona_detecta=?";
            $sql .= " OR idusuario=?)" ;

            if($select==1)$query = $CI->db->query($sql,array("EN PROCESO",$CI->session->userdata('id'),$CI->session->userdata('id')));
            if($select==2)$query = $CI->db->query($sql,array("ABIERTA",$CI->session->userdata('id'),$CI->session->userdata('id')));


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
        $CI->load->library("session");

        if (!$CI->session->userdata('logged_in')) {
            redirect(base_url());
        }
    }
}
if(!function_exists('check_permisos')){
    function check_permisos($min)
    {
        if(is_array($min)){
            for($i = 0; $i < count($min); $i++){
                if(check_permisos($min[$i])){
                    return true;
                }
            }
        } else {
            if(id_rol()==$min){
                return true;
            }
        }
        return false;


    }
}