<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('pages_model');
        $this->load->model('estudiantes_model');
        $this->load->model('registros_model');
    }

    public function index($page = 1) {
        $this->load->library('pagination');
        $data['page'] = 'home';
        $datos = $this->pages_model->get_cursos($page);
        $data['cursos'] = $datos->elements;
        $config['base_url'] = site_url('cursos/page/');
        $config['total_rows'] = $datos->paging->total;
        $config['per_page'] = 20;
        $config['num_links'] = 5;
        $config['use_page_numbers'] = TRUE;
        $config['full_tag_open'] = '<nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $data['paginado'] = $this->pagination->create_links();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/home', $data);
        $this->load->view('templates/footer', $data);
    }

    public function view($slug = NULL) {
        $data['page'] = 'curso';
        $datos = $this->pages_model->get_curso($slug);
        $data['curso'] = $datos->elements[0];
        $data['registrados'] = $this->registros_model->get_registrados($data['curso']->id);
        $data['usuarios'] = $this->estudiantes_model->get_estudiantes();
        if (empty($data['curso'])) {
            show_404();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('pages/curso', $data);
        $this->load->view('templates/footer', $data);
    }

}
