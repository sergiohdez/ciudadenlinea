<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Estudiantes_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_estudiantes($id = FALSE) {
        if ($id === FALSE) {
            $query = $this->db->get('estudiante');
            return $query->result_array();
        }

        $query = $this->db->get_where('estudiante', array('id' => $id));
        return $query->row_array();
    }

    public function get_estudiantes_registrados($id = FALSE) {
        if ($id === FALSE) {
            return array();
        }
        $this->db->select('id_estudiante')->from('registro')->where('id_curso', $id);
        $subQuery = $this->db->get_compiled_select();
        $this->db->from('estudiante')->where("id IN ($subQuery)", NULL, FALSE);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_estudiantes_disponibles($id = FALSE) {
        if ($id === FALSE) {
            return array();
        }
        $this->db->select('id_estudiante')->from('registro')->where('id_curso', $id);
        $subQuery = $this->db->get_compiled_select();
        $this->db->from('estudiante')->where("id NOT IN ($subQuery)", NULL, FALSE);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function set_estudiante() {
        $data = array(
            'nombres' => $this->input->post('nombres'),
            'apellidos' => $this->input->post('apellidos'),
            'cedula' => $this->input->post('cedula'),
            'genero' => $this->input->post('genero'),
            'email' => $this->input->post('email')
        );
        return $this->db->insert('estudiante', $data);
    }

}
