<?php


function imagen_perfil(){
    $ci=& get_instance();
    $ci->load->database();
    $ci->load->library("session");

    $sql = "SELECT logo FROM usuarios WHERE id=?";
    $query = $ci->db->query($sql,$ci->session->userdata('id'));
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

/**
 * @param int $select if 1 -> en proceso 2->abieras
 * @return mixed
 */
function tareas_pendientes($select=1){
    $ci=& get_instance();
    $ci->load->database();
    $ci->load->library("session");

    $sql = "SELECT COUNT(*) as numero FROM incidencias WHERE estado=?";
    $query = '';

    //pongo mayor que 2 porque esos dos tendran acceso a todas las incidencias, el resto solo veran las suyas
    if(id_rol()>2){
        $sql .= " AND persona_detecta=?";
        if($select==1)$query = $ci->db->query($sql,array("EN PROCESO",$ci->session->userdata('id')));
        if($select==2)$query = $ci->db->query($sql,array("ABIERTA",$ci->session->userdata('id')));
    } else {
        if($select==1)$query = $ci->db->query($sql,"EN PROCESO");
        if($select==2)$query = $ci->db->query($sql,"ABIERTA");
    }


    return $query->row(0)->numero;


}

function id_rol(){
    $ci=& get_instance();
    $ci->load->database();
    $ci->load->library("session");

    $sql = "SELECT idrol FROM usuarios WHERE id=?";
    $query = $ci->db->query($sql,$ci->session->userdata('id'));

    return $query->row(0)->idrol;
}