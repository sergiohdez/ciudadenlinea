<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages_model extends CI_Model {

    public function get_cursos($page = 1) {
        $start = 20 * ($page - 1);
        $datos = array();
        $ch = curl_init();
        $url = 'https://api.coursera.org/api/courses.v1?q=search&fields=photoUrl,description&start=' . $start . '&limit=20';
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        if (curl_errno($ch) === 0) {
            $datos = json_decode($output);
        }
        curl_close($ch);
        return $datos;
    }

    public function get_curso($slug = FALSE) {
        $datos = array();
        if ($slug !== FALSE) {
            $ch = curl_init();
            $url = 'https://api.coursera.org/api/courses.v1?q=slug&slug=' . $slug . '&fields=partnerLogo';
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);
            if (curl_errno($ch) === 0) {
                $datos = json_decode($output);
            }
            curl_close($ch);
        }
        return $datos;
    }

}
