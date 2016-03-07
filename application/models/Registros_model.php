<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Registros_model extends CI_Model {
    
    public function __construct() {
        $this->load->database();
    }
    
    public function get_registrados($id = FALSE) {
        if($id === FALSE) {
            return array();
        }
        
        $query = $this->db->get_where('registro', array('id_curso' => $id));
        return $query->result_array();
    }
    
}