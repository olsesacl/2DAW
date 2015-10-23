<?php
class Stores_model extends CI_Model{

    function __construct(){

        parent::__construct();
        $this->load->database(); //per a poder fer conexio a la base de dades
    }

    public function getAllStores(){

        $sql = "SELECT * FROM cg_store ORDER BY store_name";

        $query = $this->db->query($sql);

        if($query->num_rows() > 0){

            return $query->result();
        }
    }
}

?>
