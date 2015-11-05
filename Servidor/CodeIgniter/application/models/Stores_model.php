<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Stores_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    function getAllStores(){
        $sql = "SELECT * FROM cg_store ORDER BY store_name";
        $query = $this->db->query($sql);
        
        if($query->num_rows() > 0) {
            return $query->result();
        }
    }

}