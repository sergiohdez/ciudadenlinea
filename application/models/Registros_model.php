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
    
    public function set_registro() {
        $estudiantes = $this->input->post('estudiantes');
        $v_estudiantes = explode(',', $estudiantes);
        $curso = $this->input->post('id_curso');
        $data = array();
        foreach ($v_estudiantes as $estudiante) {
            $data[] = array('id_estudiante' => $estudiante, 'id_curso' => $curso);
        }
        return $this->db->insert_batch('registro', $data);
    }
    
}