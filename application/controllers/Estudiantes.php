<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Estudiantes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('estudiantes_model');
        $this->load->model('registros_model');
    }

    public function create() {
        $data['page'] = 'registro';
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nombres', 'Nombres', 'htmlspecialchars|required', array(
            'required' => 'El campo %s es requerido'
                )
        );
        $this->form_validation->set_rules('apellidos', 'Apellidos', 'htmlspecialchars|required', array(
            'required' => 'El campo %s es requerido'
                )
        );
        $this->form_validation->set_rules('cedula', 'Identificación', 'required|is_unique[estudiante.cedula]', array(
            'required' => 'El campo %s es requerido',
            'is_unique' => 'Ya existe un estudiante con la misma identificación'
                )
        );
        $this->form_validation->set_rules('genero', 'Género', 'required', array(
            'required' => 'El campo %s es requerido'
                )
        );
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[estudiante.email]', array(
            'required' => 'El campo %s es requerido',
            'valid_email' => 'El %s no es válido',
            'is_unique' => 'Ya existe un estudiante con el mismo email'
                )
        );
        if ($this->form_validation->run() === FALSE) {
            $data['msg'] = '';
        } else {
            $data['msg'] = 'Registro de estudiante exitoso';
            $this->estudiantes_model->set_estudiante();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('pages/registro');
        $this->load->view('templates/footer', $data);
    }
    
    public function register() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('estudiantes', 'Estudiantes', 'required', array(
            'required' => 'Se debe seleccionar al menos un estudiante'
                )
        );
        if ($this->form_validation->run() === FALSE) {
            $data['error'] = TRUE;
            $data['msg'] = validation_errors();
        } else {
            $data['error'] = FALSE;
            $data['msg'] = 'Registro de estudiante exitoso';
            $this->registros_model->set_registro();
        }
        echo json_encode($data);
    }

}
